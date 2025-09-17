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

namespace Belcms\Pages\Models;

use BelCMS\Core\eMail;
use BelCMS\Core\encrypt;
use BelCMS\Core\Secure;
use BelCMS\Core\User;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

final class ModelsUser
{
    public function blackListEmail ($data)
    {
        $sql = New BDD();
        $sql->table('TABLE_MAIL_BLACKLIST');
        $sql->isObject(false);
        $sql->queryAll();
        $results = $sql->data;
        return $results;
    }

    public function checkUser ($name)
    {
        $sql = New BDD();
        $sql->table('TABLE_USERS');
        $sql->where(array('name'=>'username','value'=> $name));
        $sql->count();
        $returnCheckName = (int) $sql->data;
        return $returnCheckName;
    }

    public function checkMail ($mail)
    {
        $sql = New BDD();
        $sql->table('TABLE_USERS');
        $sql->where(array('name'=>'mail','value'=>$mail));
        $sql->count();
        $checkMail = (int) $sql->data;
        return $checkMail;
    }

    public function sendRegistration (array $data)
    {
        if ($data) {
            $hash_key = md5(uniqid(rand(), true));
            $passwordCrypt =  new encrypt($data['password'], $_SESSION['CONFIG']['CMS_KEY_ADMIN']);
            $password = $passwordCrypt->encrypt();
            $pass_key = Common::randomString(32);

            $insertUser = array(
                'id'                => null,
                'username'          => $data['username'],
                'hash_key'          => $hash_key,
                'password'          => $password,
                'mail'              => $data['mail'],
                'ip'                => Common::getIp(),
                'expire'            => (int) 0,
                'token'             => '',
                'number_valid'      => '',
                '2FA'               => 0,
                'admin'             => 0,
                'root'              => 0
            );

            if (constant('CMS_VALIDATION') == 'mail') {
                $insertUser['valid'] = (int) 0;
                $insertUser['number_valid'] = $pass_key;
            } else {
                $insertUser['valid'] = (int) 1;
                $insertUser['number_valid'] = null;
            }

            $test = New BDD();
            $test->table('TABLE_USERS');
            $test->count();

            $insert = New BDD();
            $insert->table('TABLE_USERS');
            $insert->insert($insertUser);

            if ($test->data == 0) {
                $insertGroups = array(
                    'id'                => null,
                    'hash_key'          => $hash_key,
                    'user_group'        => 1,
                    'user_groups'       => 1,
                );
            } else {
                $insertGroups = array(
                    'id'                => null,
                    'hash_key'          => $hash_key,
                    'user_group'        => 2,
                    'user_groups'       => 2,
                );
            }

            $insertGrp = New BDD();
            $insertGrp->table('TABLE_USERS_GROUPS');
            $insertGrp->insert($insertGroups);

            $dataProfils = array(
                'hash_key'     => $hash_key,
                'gender'       => 'unisexual',
                'public_mail'  => '',
                'websites'     => '',
                'list_ip'      => '',
                'avatar'       => constant('DEFAULT_AVATAR'),
                'info_text'    => '',
                'birthday'     => date('Y-m-d'),
                'country'      => '',
                'hight_avatar' => '',
                'friends'      => ''
            );
            $insertProfils = New BDD();
            $insertProfils->table('TABLE_USERS_PROFILS');
            $insertProfils->insert($dataProfils);

            $insertSocial = New BDD();
            $insertSocial->table('TABLE_USERS_SOCIAL');
            $insertSocial->insert(array('hash_key'=> $hash_key));

            $hardware = New BDD();
            $hardware->table('TABLE_USERS_HARDWARE');
            $hardware->insert(array('hash_key'=> $hash_key));


            $stats = new BDD();
            $stats->table('TABLE_USERS_PAGE');
            $stats->insert(array('hash_key' => $hash_key));

            if (constant('CMS_VALIDATION') == 'mail') {
                require ROOT.DS.'core'.DS.'class.mail.php';
                $mail = new eMail;
                $mail->setFrom($_SESSION['CONFIG_CMS']['CMS_WEBSITE_NAME']);
                $mail->addAdress($data['email'], $data['username']);
                $mail->subject(constant('ACCOUNT_REGISTRATION'));
                $mail->body(self::sendHtmlBody($hash_key));
                $mail->submit();
            }
        }
        $return['msg']  = constant('CURRENT_RECORD');
        $return['type'] = 'success';
        return $return;
    }

    private function sendHtmlBody ($hash_key)
    {
        setLocale(LC_TIME, 'fr_FR.utf8');

        $date = new \DateTime();
        $date = $date->format('d/m/Y à H:i:s');

        $user = User::getInfosUserAll($hash_key);

        if ($_SERVER['SERVER_PORT'] == '80') {
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        } else {
            $host = 'https://'.$_SERVER['HTTP_HOST'].'/';
        }

        return '<table width="100%" border="0" cellspacing="5" cellpadding="5" bgcolor="#666666">
                <thead><tr><th><a style="color:#CCC; text-decoration:none" href="'.$host.'" style="display:block; text-align:center">'.constant('CMS_NAME').'</a></th></tr>
                </thead>
                <tbody><tr><td>
                <table width="90%" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="#FFF"><tr><td><p>'.constant('ACTIVE_TO_SERIAL').'</p></td></tr></table></td></tr></tbody></table>
                <table style="color:#FFF; text-align:center" width="100%" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="#3333"><tr><td>'.$user->user->number_valid.'</td></tr></table>
                <table style="color:#FFF; text-align:center" width="100%" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="#8f8e8c"><thead><tr><td colspan="2"><b>'.constant('INFOS').'</b></td></tr></thead><tbody><tr bordercolor="#FFF"><td style="text">'.constant('NAME').'</td><td><b>'.$user->user->username.'</b></td></tr><tr><td>'.constant('DATE').'</td><td><b>'.$date.'</b></td></tr><tr><td>IP</td><td><b>'.Common::GetIp().'</b></td></tr></tbody>
                </table></body></html>';
    }
    #########################################
    # login
    #########################################
    public function login($name = null, $password = null)
    {
        return User::login($name, $password);
    }
    #########################################
    # Update l'utilisateur
    #########################################
    public function updateUser (array $data)
    {
        $where[] = array('name'=>'hash_key','value'=>$_SESSION['USER']->user->hash_key);
        #-----------------------------------------------------------#
        $updateUser = array('username' => $data['username'], 'mail' => $data['mail']);
        #-----------------------------------------------------------#
        $sqlUser = new BDD;
        $sqlUser->table('TABLE_USERS');
        $sqlUser->where($where);
        $sqlUser->update($updateUser);
        #-----------------------------------------------------------#
        $updateProfils = array('birthday' => $data['birthday'], 'websites' => $data['websites'], 'country' => $data['country'], 'gender' => $data['gender'], 'info_text' => $data['info_text']);
        $sqlProfils = new BDD;
        $sqlProfils->table('TABLE_USERS_PROFILS');
        $sqlProfils->where($where);
        $sqlProfils->update($updateProfils);
        #-----------------------------------------------------------#
        $return['msg']  = constant('PROFILE_UPDATE_SUCCESS');
        $return['type'] = 'success';
        #-----------------------------------------------------------#
        $_SESSION['USER'] = User::getInfosUserAll($_SESSION['USER']->user->hash_key);
        #-----------------------------------------------------------#
        return $return;
    }
    public function updateMaterial (array $data) : array
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS_HARDWARE');
        $sql->where(array('name' => 'hash_key', 'value' => $_SESSION['USER']->user->hash_key));
        $sql->update($data);
        #-----------------------------------------------------------#
        $return['msg']  = constant('HARDWARE_UPDATE_SUCCESS');
        $return['type'] = 'success';
        #-----------------------------------------------------------#
        $_SESSION['USER'] = User::getInfosUserAll($_SESSION['USER']->user->hash_key);
        #-----------------------------------------------------------#
        return $return;
    }
    public function updateSocial (array $data) : array
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS_SOCIAL');
        $sql->where(array('name' => 'hash_key', 'value' => $_SESSION['USER']->user->hash_key));
        $sql->update($data);
        #-----------------------------------------------------------#
        $return['msg']  = constant('SOCIAL_UPDATE_SUCCESS');
        $return['type'] = 'success';
        #-----------------------------------------------------------#
        $_SESSION['USER'] = User::getInfosUserAll($_SESSION['USER']->user->hash_key);
        #-----------------------------------------------------------#
        return $return;
    }
    #########################################
	# Enregistre un nouveau mot de passe
	#########################################
	public function sendSecurity ($data) : array
	{
        $hash_key = $_SESSION['USER']->user->hash_key;
		$sql = New BDD();
		$sql->table('TABLE_USERS');
		$sql->where(array('name' => 'hash_key', 'value' => $hash_key));
		$sql->queryOne();
		$results = $sql->data;

        $passwordDeCrypt =  new encrypt($results->password, constant('CMS_API_CLEF'));
        $a = $passwordDeCrypt->decrypt();
		$b = $data['password_old'];

		if ($a == $b) {
			$new = new encrypt($data['password_new'], constant('CMS_API_CLEF'));
			$new = $new->encrypt();
			$insert['password'] = $new;
			$sql = New BDD();
			$sql->table('TABLE_USERS');
			$sql->where(array('name' => 'hash_key', 'value' => $hash_key));
			$sql->update($insert);
            User::dieCoockie();
            User::login($results->username, $data['password_new']);
            $return['msg']  = constant('SEND_PASS_IS_OK');
            $return['type'] = 'success';
            #-----------------------------------------------------------#
            $_SESSION['USER'] = User::getInfosUserAll($hash_key);
            #-----------------------------------------------------------#
			return $return;
		} else {
            $return['msg']  = constant('OLD_PASS_FALSE');
            $return['type'] = 'error';
			return $return;
		}
	}

    public function deleteAccount () : array
    {
        User::delUserAllCofnig($_SESSION['USER']->user->hash_key);
        $return['msg']  = constant('USER_DELETE_OK');
        $return['type'] = 'success';
        return $return;
    }

    public function ChangeAvatar ($img) : array
    {
        $data['avatar'] = $img;
        $sql = new BDD;
        $sql->table('TABLE_USERS_PROFILS');
        $sql->where(array('name' => 'hash_key', 'value' => $_SESSION['USER']->user->hash_key));
        $sql->update($data);
        #-----------------------------------------------------------#
        $_SESSION['USER'] = User::getInfosUserAll($_SESSION['USER']->user->hash_key);
        #-----------------------------------------------------------#
        $return['msg']  = constant('USER_CHANGE_AVATAR_OK');
        $return['type'] = 'success';
        return $return;
    }

    public function DeleteAvatar ($img) : array
    {
        $data['avatar'] = constant('DEFAULT_AVATAR');
        $sql = new BDD;
        $sql->table('TABLE_USERS_PROFILS');
        $sql->where(array('name' => 'hash_key', 'value' => $_SESSION['USER']->user->hash_key));
        $sql->update($data);
        #-----------------------------------------------------------#
        $_SESSION['USER'] = User::getInfosUserAll($_SESSION['USER']->user->hash_key);
        #-----------------------------------------------------------#
        $return['msg']  = constant('USER_DELETE_AVATAR_OK');
        $return['type'] = 'success';
        return $return;
    }

    public function changeGravatar ($num)
    {
        $data['gravatar'] = (int) $num;
        $sql = new BDD;
        $sql->table('TABLE_USERS_PROFILS');
        $sql->where(array('name' => 'hash_key', 'value' => $_SESSION['USER']->user->hash_key));
        $sql->update($data);
        #-----------------------------------------------------------#
        $_SESSION['USER'] = User::getInfosUserAll($_SESSION['USER']->user->hash_key);
        #-----------------------------------------------------------#
        $return['msg']  = constant('USER_GRAVATAR_OK');
        $return['type'] = 'success';
        return $return;
    }

    public function sendProfils ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS_PROFILS');
        $sql->where(array('name' => 'hash_key', 'value' => $_SESSION['USER']->user->hash_key));
        $sql->update($data);
        #-----------------------------------------------------------#
        $_SESSION['USER'] = User::getInfosUserAll($_SESSION['USER']->user->hash_key);
        #-----------------------------------------------------------#
        $return['msg']  = 'Profil mise à jour';
        $return['type'] = 'success';
        return $return;
    }

    public function mailSecureBDD ($mail)
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'mail', 'value' => $mail));
        $sql->count();
        if ($sql->data == true) {
            return true;
        } else {
            return false;
        }
    }

	public function getUserInfo ($mail)
	{
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'mail', 'value' => $mail));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
	}
    #########################################
	# Update le token
	#########################################
    public function updateLostPassword ($mail, $token)
    {
        $where[] = array('name' => 'mail', 'value' => $mail);
        #-----------------------------------------------------------#
        $updateUser = array('token' => $token);
        #-----------------------------------------------------------#
        $sqlUser = new BDD;
        $sqlUser->table('TABLE_USERS');
        $sqlUser->where($where);
        $sqlUser->update($updateUser);
        #-----------------------------------------------------------#
    }

    public function checkToken ($mail, $token)
    {
        $where[] = array('name' => 'token', 'value' => $token);
        $where[] = array('name' => 'mail', 'value' => $mail);
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where($where);
        $sql->count();
        if ($sql->data == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function removeToken ($mail)
    {
        $data['token'] = null;
        $where[] = array('name' => 'mail', 'value' => $mail);
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where($where);
        $sql->update($data);
    }

    public function sendNewPass ($mail, $password)
    {
        $where[] = array('name' => 'mail', 'value' => $mail);
        $data['mail'] = $mail;
        $data['password'] = $password;
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where($where);
        $sql->update($data);
    }
}