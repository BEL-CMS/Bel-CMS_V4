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
#  TABLE_CONTACT
#  TABLE_CONTACT_CAT
############################################
final class contact
{
    public function getCat ()
    {
        $sql = new BDD();
        $sql->table('TABLE_CONTACT_CAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function send ($data)
    {
        $sql = new BDD();
        $sql->table('TABLE_CONTACT');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return == true) {
            return true;
        } else {
            return false;
        }
    }
}