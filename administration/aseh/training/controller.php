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

class Training extends AdminPages
{
    var $admin  = true; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsTraining'; // Nom du Models (récupération de données)

	public function index ()
	{
        $menu[] = array('title' => 'Liste des participants', 'href' => 'training?Admin&option=aseh', 'ico'  => 'fa-solid fa-users', 'active' => 'active');
        $menu[] = array('title' => 'Liste des activités', 'href' => 'training/listActivity?Admin&option=aseh', 'ico'  => 'fa-solid fa-calendar-days');

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
            }
        }
        $this->set($a);
        $this->render('index', $menu);
    }

    public function listActivity ()
    {
        $menu[] = array('title' => 'Liste des participants', 'href' => 'training?Admin&option=aseh', 'ico'  => 'fa-solid fa-users');
        $menu[] = array('title' => 'Liste des activités', 'href' => 'training/listActivity?Admin&option=aseh', 'ico'  => 'fa-solid fa-calendar-days', 'active' => 'active');
        $menu[] = array('title' => 'Crée une activité', 'href' => 'training/addActivity?Admin&option=aseh', 'ico'  => 'fa-solid fa-house-flood-water-circle-arrow-right');
        $menu[] = array('title' => 'Activation d\'un entrainement', 'href' => 'training/activation?Admin&option=aseh', 'ico'  => 'fa-solid fa-toggle-on');

        $d['data'] = $this->models->getActivity ();
        $this->set($d);

        $this->render('activity', $menu);
    }

    public function addActivity ()
    {
        $menu[] = array('title' => 'Liste des participants', 'href' => 'training?Admin&option=aseh', 'ico'  => 'fa-solid fa-users');
        $menu[] = array('title' => 'Liste des activités', 'href' => 'training/listActivity?Admin&option=aseh', 'ico'  => 'fa-solid fa-calendar-days');
        $menu[] = array('title' => 'Crée une activité', 'href' => 'training/addActivity?Admin&option=aseh', 'ico'  => 'fa-solid fa-house-flood-water-circle-arrow-right', 'active' => 'active');
        $menu[] = array('title' => 'Activation d\'un entrainement', 'href' => 'training/activation?Admin&option=aseh', 'ico'  => 'fa-solid fa-toggle-on');
        $this->render('addactivity', $menu);
    }

    public function activation ()
    {
        $menu[] = array('title' => 'Liste des participants', 'href' => 'training?Admin&option=aseh', 'ico'  => 'fa-solid fa-users');
        $menu[] = array('title' => 'Liste des activités', 'href' => 'training/listActivity?Admin&option=aseh', 'ico'  => 'fa-solid fa-calendar-days');
        $menu[] = array('title' => 'Crée une activité', 'href' => 'training/addActivity?Admin&option=aseh', 'ico'  => 'fa-solid fa-house-flood-water-circle-arrow-right');
        $menu[] = array('title' => 'Activation d\'un entrainement', 'href' => 'training/activation?Admin&option=aseh', 'ico'  => 'fa-solid fa-toggle-on', 'active' => 'active');

        $d['data'] = $this->models->getActivity ();
        $this->set($d);

        $this->render('activation', $menu);
    }

    public function optionActive ()
    {
        $id = $_POST['lieu'];
        if (Common::is_numeric($id) or $id == "false") {
            if ($id == false) {
                $id = 0;
            }
            $return = $this->models->actif ($id);
            if ($return === true) {
                Notification::success(constant('PARAMETER_EDITING_SUCCESS'), 'Activités');
                $this->redirect('training/addActivity?Admin&option=aseh', 2);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'activités');
                $this->redirect('training/addActivity?Admin&option=aseh', 2);
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
            $this->redirect('training?Admin&option=aseh', 2);
            return;
        }
    }
    
    public function delActivity ()
    {
        $id = $_POST['ID'];
        if (Common::is_numeric($id) or $id == false) {
            $del = $this->models->delActivity ($id);
            if ($del === true) {
                Notification::success(constant('PARAMETER_EDITING_SUCCESS'), 'Activités');
                $this->redirect('training/addActivity?Admin&option=aseh', 2);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'activités');
                $this->redirect('training/addActivity?Admin&option=aseh', 2);
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
            $this->redirect('training?Admin&option=aseh', 2);
            return;
        }
    }

    public function deluser ()
    {
        $id = $_POST['id'];
        if (Common::is_numeric($id)) {
            $del = $this->models->delUser ($id);
            if ($del === true) {
                Notification::success(constant('PARAMETER_EDITING_SUCCESS'), 'Utilisateur');
                $this->redirect('training?Admin&option=aseh', 1);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'activités');
                $this->redirect('training?Admin&option=aseh', 2);
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
            $this->redirect('training?Admin&option=aseh', 2);
            return;
        }
    }

    public function sendActivity ()
    {
        $data['lieu']            = Common::VarSecure($_POST['lieu']);
        $data['adress']          = Common::VarSecure($_POST['adress']);
        $data['date_activite']   = Common::DatetimeSQL($_POST['date'], false, 'Y-m-d');

        if (preg_match('/^([01]\d|2[0-3]):([0-5]\d)$/', $_POST['time_1'])) {
            $data['heure_debut'] = $_POST['time_1'];
        } else {
            Notification::alert('Erreur sur l\'heure de début.');
        }

        if (preg_match('/^([01]\d|2[0-3]):([0-5]\d)$/', $_POST['time_2'])) {
            $data['heure_fin'] = $_POST['time_2'];
        } else {
            Notification::alert('Erreur sur l\'heure de fin.');
        }

        $return = $this->models->insertActivity ($data);

        if ($return === false) {
            Notification::error(constant('ERROR_INSERT_BDD'), 'Erreur d\'envoie de donnée');
        } else {
            Notification::success('L\'inscription à la base de données a été un succès.', 'Formation Osez sauver');
        }
        $this->redirect('training/listActivity?Admin&option=aseh', 2);
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