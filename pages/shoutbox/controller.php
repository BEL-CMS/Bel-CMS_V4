<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;

use BelCMS\Core\Pages;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Shoutbox extends Pages
{
    var $useModels = 'Shoutbox';

    function index ()
    {
        echo "teste";
    }

    public function addMessage ()
    {
        $d['user'] = strlen($_SESSION['USER']->user->hash_key) == 32 ? $_SESSION['USER']->user->hash_key : false;
        $d['msg']  = Common::VarSecure($_POST['text'], null);

        if ($d['user'] === false) {
            return (array('msg' => 'Haskey incorrecte, veuillez réessayer...'));
        }

        if (empty($d['msg'])) {
            return (array('msg' => 'Aucun texte écrit...'));
        }

        if (!empty($d['msg']) and $d['user'] !== false) {
            $data['hash_key'] = $d['user'];
            $data['msg']      = $d['msg'];
            $return = $this->models->addMessage($data);
            if ($return === true) {
                echo 'Le message a été envoyé avec succès.';
            } else {
                echo 'Problème survenu lors de l\'envoi du message.';
            }
        }
    }
}