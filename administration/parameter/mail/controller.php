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

use BelCMS\Core\Secure;
use BelCMS\Core\Security;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Mail extends AdminPages
{
    var $admin  = true; // Admin suprême uniquement (Groupe 1);
    var $active = true;
    var $bdd    = 'ModelsMail';

    public function index() 
    {
        $d = array();
        $data = $this->models->getInfoMail ();

        foreach ($data as $value) {
            $d[$value->name] = $value->config;
        }
        $d['data'] = (object) $d;

        $this->set($d);
        $this->render ('index');
    }

    public function save ()
    {
        $save['host']        = Common::VarSecure($_POST['host'], null);
        $save['Port']        = is_numeric($_POST['Port']) ? $_POST['Port'] : '587';
        $save['SMTPAuth']    = $_POST['SMTPAuth'] == 'true' ? true : false;
        $save['SMTPAutoTLS'] = $_POST['SMTPAutoTLS'] == '1' ? true : false;
        $save['WordWrap']    = is_numeric($_POST['WordWrap']) ? $_POST['WordWrap'] : '65';
        $save['IsHTML']      = $_POST['IsHTML'] == 'true' ? true : false;
        $save['setFrom']     = Secure::isMail($_POST['setFrom']);
        $save['fromName']    = Common::VarSecure($_POST['fromName'], null);
        switch ($_POST['charset']) {
            case 'UTF-8':
                $save['charset'] = 'UTF-8';
            break;

            case 'Windows-1252':
                $save['charset'] = 'Windows-1252';
            break;

            case 'ISO-8859-1':
                $save['charset'] = 'ISO-8859-1';
            break;

            default:
                $save['charset'] = 'UTF-8';
            break;
        }
        $save['username']    = Common::VarSecure($_POST['username'], null);
        $save['Password']    = Common::VarSecure($_POST['Password'], null);

        $return = $this->models->save($save);
        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SAVE_BDD_SUCCESS')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('mail?admin&option=parameter', 3);
        } else if ($return = 'false_array') {
            $array = array(
                'type' => 'error',
                'text' => constant('ERROR_ARRAY')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('mail?admin&option=parameter', 3);
        } else {
            $array = array(
                'type' => 'warning',
                'text' => constant('SAVE_BDD_ERROR')
            );
            $this->error('Galeries', $array['text'], $array['type']);
            $this->redirect('mail?admin&option=parameter', 3);
        }
    }
}