<?php
/**
 * Bel-CMS [Content management system]
 * *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;

use BelCMS\Core\Pages;
use BelCMS\Core\Captcha;
use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Requires\Common;
use BelCMS\Core\User;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class BuyPlan extends Pages
{
    var $useModels = 'ModelsBuyPlan';
	##################################################
    #   Page principal de l'achat du plan hebergement
    ##################################################
    public function index ()
    {
        if (User::isLogged() === false) {
            $return['type'] = 'infos';
            $return['msg']  = 'L\'accès à la demande d\'un plan d\'hébergement est soumis à l\'authentification ou à l\'enregistrement.';
            $this->message($return['type'], $return['msg'], constant('INFO'));
            $this->redirect('user/login?echo', 5); 
        } else {
            if (isset($_GET['plan'])) {

                $captcha = new Captcha ();
                $a['captcha'] = $captcha->createCaptcha ();
                $this->set($a);

                if ($_GET['plan'] == 1 or $_GET['plan'] == 2 or $_GET['plan'] == 3) {
                    $this->render('index');
                } else {
                    $return['type'] = 'warning';
                    $return['msg']  = 'Votre plan d\'hébergement est réalisable moyennant une demande spécifique.(”devis”), par e-mail ou sur le forum';
                    $this->message($return['type'], $return['msg'], constant('INFO'));
                    $this->redirect('buyPlan/main', 3); 
                }
            } else {
                $return['type'] = 'warning';
                $return['msg']  = 'Votre plan d\'hébergement est réalisable moyennant une demande spécifique.(”devis”), par e-mail ou sur le forum';
                $this->message($return['type'], $return['msg'], constant('INFO'));
                $this->redirect('buyPlan/main', 3);
            }
        }
    }
	##################################################
    #   Les achats
    ##################################################
    public function main ()
    {
        $set['web'] = $this->models->getWeb ();
        $this->set($set);
        $this->render('main');
    }
	##################################################
    #   Confirmation de l'achat
    ##################################################
    public function buy ()
    {
        if (Captcha::verify() == true) {
            if ($_POST['plan'] == 1) {
                self::buy_1($_POST);
            } else if ($_POST['plan'] == 2) {
                self::buy_2($_POST);
            } else if ($_POST['plan'] == 3) {
                self::buy_3($_POST);
            } else {
                $return['type'] = 'warning';
                $return['msg']  = 'Aucun plan de choisis';
                $this->message($return['type'], $return['msg'], constant('INFO'));
                $this->redirect('index.php', 5);
            }
        } else {
            Notification::error(constant('CODE_CAPTCHA_ERROR'), 'Captcha');
            return;
        }
    }
	##################################################
    #   Achat du plan n° 1 + secure $_POST
    ##################################################
    public function buy_1 ($data)
    {
        $mail                  = Secure::isMail($data['email']);
        $post['mail_user']     = Secure::isMail($mail);
        $post['plan']          = (int) 1;
        $post['currency']      = '2.50';
        $post['website_1']     = Common::VarSecure($data['website']['0'], null);
        $post['emailbelcms_1'] = Common::VarSecure($data['emailbelcms']['0'], null);
        $post['phpversion']    = Common::VarSecure($data['phpversion'], null);
        $post['comment']       = Common::VarSecure($data['comment'], 'html');
        $post['ip']            = Common::GetIp();
        $post['unique_key']    = strtoupper(Common::randomString(16));

        if (isset($_FILES['files']) and !empty($_FILES['files'])) {
            $return = Common::Upload ('files', 'uploads/web_hosting', 'all', true);
            $post['file'] = '/uploads/web_hosting'.$return;
            if ($post['file'] == '/uploads/web_hostingUPLOAD_NONE') {
                $post['file'] = null;
            }
        }

        $return = $this->models->buy($post);

        if ($return == 1) {
            $this->redirect('buyPlan/addbuy', 0);
        } else {
            unset($return);
            $return['msg']  = 'L\'inscription en base de données corrompue, veuillez réessayer.';
            Notification::warning($return['msg'], 'Plan d\'hebergement');
            $this->redirect('index.php', 5);
        }
    }
	##################################################
    #   Achat du plan n° 2 + secure $_POST
    ##################################################
    public function buy_2 ($data)
    {
        $mail                  = Secure::isMail($data['email']);
        $post['mail_user']     = Secure::isMail($mail);
        $post['plan']          = (int) 2;
        $post['currency']      = '6.00';
        $post['website_1']     = Common::VarSecure($data['website']['0'], null);
        $post['website_2']     = Common::VarSecure($data['website']['1'], null);
        $post['emailbelcms_1'] = Common::VarSecure($data['emailbelcms']['0'], null);
        $post['emailbelcms_2'] = Common::VarSecure($data['emailbelcms']['1'], null);
        $post['emailbelcms_3'] = Common::VarSecure($data['emailbelcms']['2'], null);
        $post['phpversion']    = Common::VarSecure($data['phpversion'], null);
        $post['comment']       = Common::VarSecure($data['comment'], 'html');
        $post['ip']            = Common::GetIp();
        $post['unique_key']    = strtoupper(Common::randomString(16));

        if (isset($_FILES['files']) and !empty($_FILES['files'])) {
            $return = Common::Upload ('files', 'uploads/web_hosting', 'all', true);
            $post['file'] = '/uploads/web_hosting'.$return;
            if ($post['file'] == '/uploads/web_hostingUPLOAD_NONE') {
                $post['file'] = null;
            }
        }

        $return = $this->models->buy($post);

        if ($return == 1) {
            $this->redirect('buyPlan/addbuy', 0); 
        } else {
            unset($return);
            $return['msg']  = 'L\'inscription en base de données corrompue, veuillez réessayer.';
            Notification::warning($return['msg'], 'Plan d\'hebergement');
            $this->redirect('index.php', 5);
        }
    }
	##################################################
    #   Achat du plan n° 3 + secure $_POST
    ##################################################
    public function buy_3 ($data)
    {
        $mail                  = Secure::isMail($data['email']);
        $post['mail_user']     = Secure::isMail($mail);
        $post['plan']          = (int) 3;
        $post['currency']      = '22.50';
        $post['website_1']     = Common::VarSecure($data['website']['0'], null);
        $post['website_2']     = Common::VarSecure($data['website']['1'], null);
        $post['website_3']     = Common::VarSecure($data['website']['2'], null);
        $post['emailbelcms_1'] = Common::VarSecure($data['emailbelcms']['0'], null);
        $post['emailbelcms_2'] = Common::VarSecure($data['emailbelcms']['1'], null);
        $post['emailbelcms_3'] = Common::VarSecure($data['emailbelcms']['2'], null);
        $post['emailbelcms_4'] = Common::VarSecure($data['emailbelcms']['3'], null);
        $post['emailbelcms_5'] = Common::VarSecure($data['emailbelcms']['4'], null);
        $post['phpversion']    = Common::VarSecure($data['phpversion'], null);
        $post['comment']       = Common::VarSecure($data['comment'], 'html');
        $post['ip']            = Common::GetIp();
        $post['unique_key']    = strtoupper(Common::randomString(16));

        if (isset($_FILES['files']) and !empty($_FILES['files'])) {
            $return = Common::Upload ('files', 'uploads/web_hosting', 'all', true);
            $post['file'] = '/uploads/web_hosting'.$return;
            if ($post['file'] == '/uploads/web_hostingUPLOAD_NONE') {
                $post['file'] = null;
            }
        }

        $return = $this->models->buy($post);

        if ($return == 1) {
            $this->redirect('buyPlan/addbuy', 0);
        } else {
            unset($return);
            $return['msg']  = 'L\'inscription en base de données corrompue, veuillez réessayer.';
            Notification::warning($return['msg'], 'Plan d\'hebergement');
            $this->redirect('index.php', 5);
        }
    }

    public function addbuy ()
    {
        $a['data'] = $this->models->getInfos ();
        $this->set($a);

        $b['buy']  = $this->models->getbuy ($_SESSION['USER']->unique_key);
        $this->set($b);

        $this->render('addbuy');
    }

    public function checkNDD ()
    {
        if (User::isLogged() === true) {
            if (isset($_POST['valeur'])) {

                $valeur = Common::VarSecure($_POST['valeur'], null);
                $count  = $this->models->checkNDD($valeur);

                if ($count == 1) {
                    echo "<span class='text-danger'>❌ Déjà pris</span>";
                } else {
                    echo "<span class='text-success'>✅ Disponible</span>";
                }

            }
        } else {
            $this->redirect('user?login&echo', 0);
        }
    }

    public function checkMails ()
    {
        if (User::isLogged() === true) {
            if (isset($_POST['valeur'])) {

                $valeur = Common::VarSecure($_POST['valeur'], null);
                $count = $this->models->checkMails($valeur);

                if ($count == 1) {
                    echo "<span class='text-danger'>❌ Déjà pris</span>";
                } else {
                    echo "<span class='text-success'>✅ Disponible</span>";
                }

            }
        } else {
            $this->redirect('user?login&echo', 0);
        }
    }

    public function view ()
    {
        $id = Common::VarSecure($this->data[2], null);
        $data['web'] = $this->models->getUniqueWeb($id);
        $this->set($data);
        $this->render('view');
    }
}