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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\Core\Notification;
use BelCMS\PDO\BDD;

final class ModelsPrefGen
{
    public function allConfig ()
    {
        $sql = new BDD;
        $sql->table('TABLE_CONFIG');
        $sql->queryAll();
        return $sql->data;
    }

    public function sendParameter ($data)
    {
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $sql = new BDD();
                $sql->table('TABLE_CONFIG');
                $sql->where(array('name' => 'name', 'value' => strtoupper($k)));
                $sql->update(array('value' => $v));
                unset($sql);
            }
            $save = array(
                'type' => 'success',
                'text' => constant('SAVE_BDD_SUCCESS')
            );
            return $save;
        } else {
            Notification::error(constant('SAVE_BDD_ERROR'));
        }
    }
}