<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

namespace Belcms\Pages\Models;
use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#  TABLE_INBOX'                            #
#  TABLE_INBOX_MSG'                        #
############################################
final class Inbox
{
     public function getMsgForUSer ($hash_key)
     {
        $array = " WHERE `send` = '".$hash_key."' OR `sendto` = '".$hash_key."' AND `read_msg_send` = '1' OR read_msg_receive = 1";
        $sql = new BDD;
        $sql->table ('TABLE_INBOX');
        $sql->where($array);
        $sql->queryAll();
        $return = $sql->data;
        return $return;
     }
}