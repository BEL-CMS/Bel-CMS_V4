<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
 */

namespace Belcms\Pages\Models;

use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#  TALBE_NEWSLETTER
############################################
final class Newsletter
{
    public function insert ($array) : array
    {
        $sql = new BDD;
        $sql->table('TALBE_NEWSLETTER');
        $sql->insert($array);
        $data = $sql->data;
        if ($data == true) {
            $return['msg']  = constant('INSERT_BDD_OK');
            $return['type'] = 'success';
        } else {
            $return['msg']  = constant('INSERT_BDD_NOK');
            $return['type'] = 'error';
        }
        return $return;
    }
}