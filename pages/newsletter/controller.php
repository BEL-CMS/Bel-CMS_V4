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
use BelCMS\Core\Pages;
use BelCMS\Core\Secure;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Newsletter extends Pages
{
    var $useModels = 'Newsletter';

    function index ()
    {

    }

    function register ()
    {
        if ($_POST['terms'] == 'on') {
            $mail = Secure::isMail($_POST['mail']);
            $ip   = Common::GetIp();
            if (User::isLogged()) {
                $hash_key = $_SESSION['USER']->user->username;
            } else {
                $hash_key = Common::VarSecure($_POST['name'], null);
            }
            $array  = array('mail' => $mail, 'ip' => $ip, 'hash_key' => $hash_key);
            $return = $this->models->insert($array);
        } else {
            $return['type'] = 'error';
            $return['msg']  = 'Les conditions n\'ont pas été approuvées.';
        }

        $this->message($return['type'], $return['msg'], constant('INFO'));
        $this->redirect('index.php', 2);
    }
}