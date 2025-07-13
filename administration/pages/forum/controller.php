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

class Forum extends Pages
{
    var $useModels = 'Forum';

    function index ()
    {
        $forum = $this->models->getNameForum ();
        foreach ($forum as $key => $value) {
            $forum[$key]->category = $this->models->getForumForID($value->id);
            foreach ($forum[$key]->category as $catKey => $catValue) {
                $forum[$key]->category[$catKey]->threads = $this->models->getIdMsg($catValue->id);
            }
        }
        foreach ($forum as $key => $value) {
            foreach ($value->category as $a => $b) {
                if (!empty($b->threads->id_message)) {
                    $msgId = $b->threads->id_message;
                    $countMessage = $this->models->getCountMsg($msgId);
                    $value->category[$a]->countMessage = $countMessage;
                    $value->category[$a]->countSubject = $this->models->getNbsubject($b->threads->id_cat);
                }
            }
        }
        $d['forum'] = $forum;
        $this->set($d);
        $this->render ('index');
    }
}