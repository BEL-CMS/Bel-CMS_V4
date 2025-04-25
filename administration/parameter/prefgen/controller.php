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
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class prefgen extends AdminPages
{
    var $admin  = true; // Admin suprême uniquement (Groupe 1);
    var $active = true;
    var $bdd    = 'ModelsPrefGen';

    public function index ()
    {
        $d['data'] = $this->models->allConfig();
        $this->set($d);
        $this->render ('index');
    }
    public function sendParameter ()
    {
        $update = array();
        $update['CMS_NAME']             = Common::VarSecure($_POST['CMS_NAME'], 'null');
        $update['CMS_DESCRIPTION']      = Common::VarSecure($_POST['CMS_DESCRIPTION'], 'html');
        $update['CMS_KEYWORDS']         = Common::VarSecure($_POST['CMS_KEYWORDS'], 'html');
        $update['CMS_CHARTE']           = Common::VarSecure($_POST['CMS_CHARTE']);
        $update['CMS_MAIL']             = Secure::isMail($_POST['CMS_MAIL']) ? $_POST['CMS_MAIL'] : $_SERVER['SERVER_ADMIN'];
        $update['CMS_VALIDATION_TIME']  = Secure::isString($_POST['CMS_VALIDATION_TIME']);
        $update['CMS_KEY_ADMIN']        = Common::VarSecure($_POST['CMS_KEY_ADMIN'], 'null');
        $update['CMS_JQUERY'] 	        = isset($_POST['CMS_JQUERY']) ? 1 : 0;
        $update['CMS_HIGHLIGHT']        = isset($_POST['CMS_HIGHLIGHT']) ? 1 : 0;
        $update['CMS_FONTAWSOME']       = isset($_POST['CMS_FONTAWSOME']) ? 1 : 0;
        $update['CMS_BOOTSTRAP']        = isset($_POST['CMS_BOOTSTRAP']) ? 1 : 0;
        $return = $this->models->sendParameter ($update);
        $this->error('Parametres', $return['text'], $return['type']);
        $this->redirect('prefgen?management&option=parameter', 1);
    }
}