<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;

use BelCMS\Core\Captcha;
use BelCMS\Core\Config;
use BelCMS\Core\eMail;
use BelCMS\Core\encrypt;
use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\Secure;
use BelCMS\Core\User as CoreUser;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class User extends Pages
{
    var $useModels = 'ModelsUser',
        $dir       = 'user';
	#########################################
    #   Creation du dossier de l'utilisateur
    #########################################
    function __construct()
    {
        parent::__construct();
        if (CoreUser::isLogged() === true) {
            $dir = constant('DIR_UPLOADS_USER').$_SESSION['USER']->user->hash_key.'/';
            if (!is_dir($dir)) {
                mkdir($dir, 0774, true);
            }
            $fopen  = fopen($dir.'/index.html', 'a+');
            fclose($fopen);

            $dir = constant('DIR_UPLOADS_USER').$_SESSION['USER']->user->hash_key.'/avatar/';
            if (!is_dir($dir)) {
                mkdir($dir, 0774, true);
            }
            $fopen  = fopen($dir.'/index.html', 'a+');
            fclose($fopen);
        }
    }
	#########################################
    #   Page principal d'utilisateur
    #########################################
    public function index ()
    {
        if (CoreUser::isLogged()) {
            $this->render('index');
        } else {
            $this->redirect('/user/login&echo', 0);
        }
    }
    public function sendGeneral ()
    {
        $data = array(
            'username'  => Common::VarSecure($_POST['username'], null),
            'mail'      => Secure::isMail($_POST['mail'])
        );
        #-----------------------------------------------------------#
        if ($_SESSION['USER']->user->username != $data['username']) {
            $checkName = $this->models->checkUser($data['username']);
            if ($checkName >= 1) {
                $this->message('warning', constant('THIS_NAME_OR_PSEUDO_RESERVED'), constant('INFO'));
            } else {
                $data['username']   = str_replace(' ', '_', $data['username']);
                $update['username'] = $data['username'];
            }
        } else {
            $update['username'] = $_SESSION['USER']->user->username;
        }
        #-----------------------------------------------------------#
        $backlist = $this->models->blackListEmail($data['mail']);
        $arrayBlackList = array();
        foreach ($backlist as $k => $v) {
            $arrayBlackList[$v['id']] = $v['name'];
        }
        if (!empty($data['mail'])) {
            $tmpMailSplit = explode('@', $data['mail']);
            $tmpNdd =  explode('.', $tmpMailSplit[1]);
        }
        $checkMail = $this->models->checkMail($data['mail']);
        if (in_array($tmpNdd[0], $arrayBlackList)) {
            $this->message('warning', constant('NO_MAIL_ALLOWED'), constant('INFO'));
        }
        if ($_SESSION['USER']->user->mail != $data['mail']) {
            if ($checkMail >= 1) {
                $this->message('warning', constant('THIS_MAIL_IS_ALREADY_RESERVED'), constant('INFO'));
            } else {
                $update['mail'] = $data['mail'];
            }
        } else {
            $update['mail'] = $_SESSION['USER']->user->mail;
        }
        #-----------------------------------------------------------#
        $profils = array(
            'birthday'  => Common::DatetimeSQL($_POST['birthday'], false, 'Y-m-d'),
            'websites'  => Secure::isUrl($_POST['websites']),
            'country'   => Common::VarSecure($_POST['country'], null),
            'gender'    => Common::VarSecure($_POST['gender'], null),
            'info_text' => Common::VarSecure($_POST['info_text'], 'html')
        );
        #-----------------------------------------------------------#
        $result = array_merge($update, $profils);
        #-----------------------------------------------------------#
        $return = $this->models->updateUser ($result);
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('user', 2);
    }
	#########################################
    #   Login
    #########################################
    public function login ()
    {
        if (CoreUser::isLogged()) {
            $this->redirect('user', 2);
        } else {
            $d['page'] = 'login';
            $this->set($d);
            $this->render('login');
        }
    }
    public function getLogin ()
    { 
        $user     = $_POST['user'];
        $password = $_POST['password'];
        $return = $this->models->login($user, $password);
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('/user/login&echo', 2);
    }
	#########################################
    #   S'enregistrer
    #########################################
    public function registred ()
    {
        if (CoreUser::isLogged()) {
            self::index();
        } else {
            $captcha = new Captcha();
            $a['captcha'] = $captcha->createCaptcha();
            $this->set($a);
            $this->render('registred');
        }
    }
    #########################################
    #   Création d'un utilisateur
    #########################################
    public function createUser()
    {
        if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
            $error = 0;
            $array['username']  = Common::VarSecure($_POST['name'], null);
            $array['mail']      = Secure::isMail($_POST['mail']);
            $array['password']  = Common::VarSecure($_POST['password'], null);
            if (!empty($array['username'])) {
                $array['username'] = str_replace(' ', '_', $array['username']);
            }

            $backlist = $this->models->blackListEmail($array['mail']);
            $arrayBlackList = array();
            foreach ($backlist as $k => $v) {
                $arrayBlackList[$v['id']] = $v['name'];
            }
            if (!empty($array['mail'])) {
                $tmpMailSplit = explode('@', $array['mail']);
                $tmpNdd =  explode('.', $tmpMailSplit[1]);
            }

            $checkName = $this->models->checkUser($array['username']);
            $checkMail = $this->models->checkMail($array['mail']);

            if (empty($array['username']) or empty($array['mail']) or empty($array['password'])) {
                $this->message('warning', constant('UNKNOW_USER_MAIL_PASS'), constant('INFO'));
            } else if (in_array($tmpNdd[0], $arrayBlackList)) {
                $this->message('warning', constant('NO_MAIL_ALLOWED'), constant('INFO'));
            } else if (strlen($array['username']) < 3) {
                $this->message('warning', constant('MIN_THREE_CARACTER'), constant('INFO'));
            } else if (strlen($array['password']) < 6) {
                $return['msg']   = constant('MIN_SIX_CARACTER');
                $error++;
                $this->message('warning', constant('MIN_SIX_CARACTER'), constant('INFO'));
            } else if (strlen($array['username']) > 32) {
                $this->message('warning', constant('MAX_CARACTER'), constant('INFO'));
            } else if ($checkName >= 1) {
                $this->message('warning', constant('THIS_NAME_OR_PSEUDO_RESERVED'), constant('INFO'));
            } elseif ($checkMail >= 1) {
                $this->message('warning', constant('THIS_MAIL_IS_ALREADY_RESERVED'), constant('INFO'));
            } else {
                $return = $this->models->sendRegistration($array);
                CoreUser::login($array['username'], $array['password']);
                $this->message('success', $return['msg'], constant('INFO'));
                $this->redirect('user', 2);
            }
        } else {
            Notification::error(constant('CODE_CAPTCHA_ERROR'), 'Captcha');
            $this->redirect('user/registred&echo', 2);
            return;
        }
    }
	#########################################
    #   Supprimé un utilisateur
    #########################################
    public function deleteAccount ()
    {
        if (CoreUser::isLogged()) {
            $return = $this->models->deleteAccount ();
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('/index.php', 2);
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user', 2);
        }
    }
	#########################################
    #   Login d'un utilisateur
    #########################################
    public function sendLogin ()
    {
        if ($_POST['user'] == '' or $_POST['password'] == '') {
            $this->message('warning', constant('UNKNOW_USER_MAIL_PASS'), constant('INFO'));
            $this->redirect('user/login&echo', 2);
        } else if (strlen($_POST['user']) < 3) {
            $this->message('warning', constant('MIN_THREE_CARACTER'), constant('INFO'));
            $this->redirect('user/login&echo', 2);
        } else if (strlen($_POST['password']) < 6) {
            $this->message('warning', constant('MIN_SIX_CARACTER'), constant('INFO'));
            $this->redirect('user/login&echo', 2);
        } else {
            $user   = Common::VarSecure($_POST['user'], null);
            $mdp    = Common::VarSecure($_POST['password'], null);
            $return = CoreUser::login($user, $mdp);
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('user', 2);
        }
    }
	#########################################
    #   Mot de passe perdu
    #########################################
    public function passwordLost ()
    {
        if (CoreUser::isLogged()) {
            $d['page'] = 'passwordLost';
            $this->set($d);
            $this->render('login');
        } else {
            $this->render ('passwordlost');
        }
    }

    public function sendLostPassword()
    {
        $mail = Secure::isMail($_POST['mail']) ? $_POST['mail'] : false;
        if ($mail == false) {
            Notification::error('Email', 'Erreur adresse email.');
            return false;
        } else {
            $mailSecureBDD = $this->models->mailSecureBDD($mail);
            if ($mailSecureBDD !== true) {
                Notification::error('Email', 'Adresse email non répertoriée dans la base de données.');
            }
             if (strlen($_POST['token'])) {
                $token = Common::VarSecure($_POST['token'], null);
                $check = $this->models->checkToken($mail, $token);
                if ($check === true) {
                    $newPassword = Common::randomString(8);
                    $new = new encrypt($newPassword, $_SESSION['CONFIG']['CMS_KEY_ADMIN']);
                    $new = $new->encrypt();
                    $insert['password'] = $new;
                    $this->models->sendNewPass ($mail, $new);
                    self::sendMailPass($mail, $newPassword);
                    $this->models->removeToken($mail);
                    Notification::success($newPassword, 'Mot de passe');
                } else {
                    $this->models->removeToken($mail);
                    Notification::error(constant('NO_VALID_TOKEN_USER'), 'Email');
                }
            }
        }
    }

    public function sendMailPass ($mail, $password)
    {
        $body = '<!DOCTYPE html>
                <html lang="fr">
                <head>
                <meta charset="UTF-8">
                </head>
                <body style="margin:0; padding:0; background-color:#f4f4f4;">
                <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4;">
                    <tr><td align="center">
                        <table class="container" width="600" cellpadding="0" cellspacing="0"
                        style="background-color:#ffffff; padding:40px; font-family:Arial, sans-serif; border-radius:8px;">
                        <tr><td align="center" style="padding-bottom:20px;"><h2 style="margin:0; color:#6c5ce7;">🔐 Récupération de votre compte</h2></td></tr>
                        <tr><td style="color:#333333; font-size:16px; line-height:1.5;">Bonjour ' . $mail . ',<br><br>
                            Vous avez demandé à récupérer votre compte. Voici votre nouveau mot de passe :<br><br><strong
                                style="display:block;text-align;center; background:#f1f1f1; padding:10px 20px; border-radius:6px; font-size:18px; letter-spacing:1px;">' . $password . '</strong><br><br>
                            <br><br>Merci,<br>L’équipe de support</td></tr>
                        <tr><td align="center" style="padding-top:30px; font-size:12px; color:#999999;">' . constant('MAIL_BY_BELCMS') . '</td></tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </body>
                </html>';
        require_once ROOT . DS . 'core' . DS . 'class.mail.php';
        $email = new eMail;
        $email->setFrom($_SESSION['CONFIG']['CMS_NAME']);
        $email->addAdress($mail, $mail);
        $email->subject(constant('GET_PASSWORD_TOKEN'));
        $email->body($body);
        $email->submit();
    }

    public function sendToken ()
    {
        if (CoreUser::isLogged() == false) {
            if (Secure::isMail($_GET['data'])) {
                $generator = self::generatePass();
                $mailSecureBDD = $this->models->mailSecureBDD ($_GET['data']);
                if ($mailSecureBDD === true) {
                    $getUser = $this->models->getUserInfo ($_GET['data']);
                    $this->models->updateLostPassword ($getUser->mail, $generator);
                    
                    require_once ROOT.DS.'core'.DS.'class.mail.php';
                    $mail = new eMail;
                    $mail->setFrom($_SESSION['CONFIG']['CMS_NAME']);
                    $mail->addAdress($getUser->mail, $getUser->username);
                    $mail->subject(constant('ACCOUNT_REGISTRATION'));
                    $mail->body(self::sendHtmlBody($getUser->username, $generator));
                    $mail->submit();
                    
                    echo 'true';
                } else {
                    echo "Ce mail ne figure pas dans notre base de données.";
                }   
            }
        }
    }

    private function sendHtmlBody ($user, $generatePass)
    {
        setLocale(LC_TIME, 'fr_FR.utf8');
        $dateNow = new \DateTimeImmutable('now');
        $dateNow->add(new \DateInterval('PT15M'));
		$currentDate  =  new \DateTimeImmutable('now');
		$currentDate  = $currentDate->format('d-m-Y H:i:s');

        return ' <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
        </head>
        <body style="margin:0; padding:0; background-color:#f4f4f4;">
            <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4;">
                <tr>
                    <td align="center">
                        <table class="container" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; padding:40px; font-family:Arial, sans-serif; border-radius:8px;">
                            <tr>
                                <td align="center" style="padding-bottom:20px;">
                                    <h2 style="margin:0; color:#6c5ce7;">🔐 Récupération de votre compte</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:#333333; font-size:16px; line-height:1.5;">Bonjour '. $user .',<br><br>
                                    Vous avez demandé à récupérer votre compte. Voici votre token de sécurité :<br><br>
                                    <strong style="display:block;text-align;center; background:#f1f1f1; padding:10px 20px; border-radius:6px; font-size:18px; letter-spacing:1px;">'.$generatePass.'</strong><br><br>
                                    Ce token est valable pendant 15 minutes jusqu\'a '.$currentDate.'<br>
                                    Si vous n’êtes pas à l’origine de cette demande, vous pouvez ignorer cet e-mail.<br><br>
                                    <a href="https://'.$_SERVER['SERVER_NAME'].'/User/passwordLost?echo&token='.$generatePass.'" class="button" style="display:block; background-color:#6c5ce7; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:6px; font-weight:bold;">Réinitialiser mon mot de passe</a><br><br>Merci,<br>L’équipe de support
                                </td>
                            </tr>
                            <tr><td align="center" style="padding-top:30px; font-size:12px; color:#999999;">'.constant('MAIL_BY_BELCMS').'</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>';
    }
	#########################################
    #   Génération de mots de passe de 
    #   32 caractères tous en MAJUSCULE
    #########################################
	private function generatePass ($height = 32){
		// initialiser la variable $return
		$return = '';
		// Définir tout les caractères possibles dans le mot de passe,
		$character = "012346789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		// obtenir le nombre de caractères dans la chaîne précédente
		$max = strlen($character);
		if ($height > $max) {
			$height = $max;
		}
		// initialiser le compteur
		$i = 0;
		// ajouter un caractère aléatoire à $return jusqu'à ce que $height soit atteint
		while ($i < $height) {
			// prendre un caractère aléatoire
			$letter = substr($character, mt_rand(0, $max-1), 1);
			// vérifier si le caractère est déjà utilisé dans $mdp
			if (!stristr($return, $character)) {
				// Si non, ajouter le caractère à $return et augmenter le compteur
				$return .= $letter;
				$i++;
			}
		}
		// retourner le résultat final
		return strtoupper($return);
    }
	#########################################
    #   Material
    #########################################
    public function material ()
    {
        if (CoreUser::isLogged()) {
            $this->render('material');
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));          
            $this->redirect('/user/login&echo', 0);
        }
    }
    public function sendMateriel ()
    {
        if (CoreUser::isLogged()) {
            foreach ($_POST as $key => $value) {
                $array[$key] = Common::VarSecure($value, null);
            }
            $return = $this->models->updateMaterial ($array);
            $this->message('success', $return['msg'], constant('INFO'));
            $this->redirect('/user/Material', 2);
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
	#########################################
    #   Social
    #########################################
    public function Social ()
    {
        if (CoreUser::isLogged()) {
            $this->render('social');
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
    public function submitsocial ()
    {
        if (CoreUser::isLogged()) {
            foreach ($_POST as $key => $value) {
                $array[$key] = Common::VarSecure($value, null);
            }
            $return = $this->models->updateSocial ($array);
            $this->message('success', $return['msg'], constant('INFO'));
            $this->redirect('/user/Social', 2);
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
	#########################################
    #   Changement de mot de passe
    #########################################
    public function mdp ()
    {
        if (CoreUser::isLogged()) {
            $this->render('mdp');
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
    public function submitPassword ()
    {
        if (CoreUser::isLogged()) {
            $data['password_old'] = Common::VarSecure($_POST['old_password'], 'html');
            $data['password_new'] = Common::VarSecure($_POST['password_new'], 'html');
            $return = $this->models->sendSecurity($data);
            
            if ($return['type'] == 'success') {
                $_SESSION['USER'] = CoreUser::getInfosUserAll();
            }
            
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('/user/mdp', 2);
        } else {
            $this->message('warning', constant('REQUESTED_PAGE_NOT_ACCESSIBLE'), constant('INFO'));
            $this->redirect('/user/login&echo', 0);
        }
    }
    #########################################
    # Deconnexion                           #
    #########################################
    public function logout ()
	{
		$return = CoreUser::logout();
        $this->message($return['type'], $return['msg'], constant('INFO'));
		$this->redirect('User', 3);
	}
    #########################################
    #   Page principal profil               #
    #########################################
    public function profils ()
    {
        $this->render('profils');
    }
    #########################################
    #   Page principal profil               #
    #########################################
    public function avatar ()
    {
        $this->render('avatar');
    }
    public function deleteAvatar()
    {
        $id = Common::VarSecure(ROOT.$_POST['avatar']);
        $return = $this->models->DeleteAvatar($id);
        unlink($id);
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('User', 2);
    }
    public function ActiveAvatar()
    {
        $id = Common::VarSecure($_POST['avatar']);
        $return = $this->models->ChangeAvatar($id);
        $_SESSION['USER'] = CoreUser::getInfosUserAll();
        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('User', 2);
    }
 
    public function sendNewAvatar ()
    {
        if ($_FILES['avatar']['error'] != 4) {
            $typeMime = getImageSize($_FILES['avatar']['tmp_name']);
            $typeMime = $typeMime['mime'];
        }
        if ($_FILES['avatar']['error'] != 4) {
            $dir = 'uploads/users/'.$_SESSION['USER']->user->hash_key.'/avatar/';
            $extensions = array('image/bmp', 'image/gif', 'image/x-icon', 'image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff', 'image/webp');
            if (!in_array($typeMime, $extensions)) {
                $return['msg']    = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, webp';
                $return['type']   = 'error';
                $return['title']  = 'Extention';
                $this->message($return['type'], $return['msg'], $return['title']);
             } else if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dir.$_FILES['avatar']['name'])) {
                $return['msg']    = 'Upload effectué avec succès';
                $return['type']   = 'success';
                $return['title']  = 'Avatar';
                $this->message($return['type'], $return['msg'], $return['title']);
            } else {
                $return['msg']    = 'Echec de l\'upload !';
                $return['type']   = 'warning';
                $return['title']  = 'Erreur inconnu';
            }
        } else {
            $return['msg']    = 'Aucun upload d\'image en cours...';
            $return['type']   = 'error';
            $return['title']  = 'Aucune image';
            $this->message($return['type'], $return['msg'], $return['title']);
        }
        $this->redirect('user', 2);
    }

    public function changeGravatar ()
    {
       $num = isset($_POST['gravatar']) ? 1 : 0;
       $return = $this->models->changeGravatar ($num);
       $this->message($return['type'], $return['msg'], constant('INFO'));
       $this->redirect('User', 2);
    }

    public function Grp()
    {
        $this->render('groups');
    }

    public function sendProfils ()
    {
        $data = Secure::isMail($_POST['mail']);
        $this->models->sendProfils($data);
        $this->redirect('/User/profils', 2);
    }
}