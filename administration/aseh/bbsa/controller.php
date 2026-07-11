<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Notification;
use BelCMS\Requires\Common;
use BelCMS\Core\Interaction;
use BelCMS\Core\Secure;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Bbsa extends AdminPages
{
    var $admin  = true; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsBBSA'; // Nom du Models (récupération de données)

	public function index ()
	{
        $menu[] = array('title' => 'Liste des inscriptions', 'href' => 'bbsa?Admin&option=aseh', 'ico'  => 'fa-solid fa-users', 'active' => 'active');

        $data = $this->models->getUsers();

        if (empty($data)) {
            $a['data'] = array();
        } else {
            foreach ($data as $key => $value) {
                $a['data'][$key]['id'] = (int) $value->id;
                $a['data'][$key]['name'] = ucfirst($value->name);
                $a['data'][$key]['username'] = ucfirst($value->username);
                $a['data'][$key]['birthday'] = Common::TransformDate($value->birthday, 'SHORT');
                $a['data'][$key]['national_number'] = self::formatNiss($value->national_number);
                $a['data'][$key]['gsm'] = self::formatBelgianGsm($value->gsm);
                $a['data'][$key]['email'] = $value->email;
                $a['data'][$key]['date_inscription'] = $value->date_inscription;
                $a['data'][$key]['lieu'] = ($value->lieu == 'Farciennes') ? 'Faricennes' : 'Montignies-s-S';
            }
        }

        $this->set($a);

        $this->render('index', $menu);
    }

    public function deluser ()
    {
        $id = $_POST['id'];
        if (Common::is_numeric($id)) {
            $del = $this->models->delUser ($id);
            if ($del === true) {
                Notification::success(constant('DEL_SUCCESS'), 'Utilisateur');
                $this->redirect('bbsa?Admin&option=aseh', 1);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'activités');
                $this->redirect('bbsa?Admin&option=aseh', 2);
            }
        } else {
            ####################################################### 
            $msg = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Activités');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            $return = array('text' => constant('ADMIN_TEXT_FALSE_ID'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('bbsa?Admin&option=aseh', 2);
            return;
        }
    }

    private function formatNiss(string $niss): string
    {
        $niss = preg_replace('/\D/', '', $niss);

        if (strlen($niss) !== 11) {
            return '';
        }

        return sprintf(
            '%s.%s-%s',
            substr($niss, 0, 6),
            substr($niss, 6, 3),
            substr($niss, 9, 2)
        );
    }

    private function formatBelgianGsm(string $gsm): string
    {
        $gsm = preg_replace('/\D/', '', $gsm);

        if (strlen($gsm) !== 10 || $gsm[0] !== '0') {
            return '';
        }

        return sprintf(
            '%s/%s.%s.%s',
            substr($gsm, 0, 4),
            substr($gsm, 4, 2),
            substr($gsm, 6, 2),
            substr($gsm, 8, 2)
        );
    }
}