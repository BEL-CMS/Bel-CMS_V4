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

namespace Belcms\Pages\Models;

use BelCMS\Core\Config;
use BelCMS\Core\Dispatcher;
use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#  TABLE_USERS
############################################
final class Members
{
    public function members(string $letter)
    {
        $sql = new BDD();
        $sql->table(TABLE_USERS . ' u');
        $sql->fields([
            'u.*',
            'p.avatar',
            'p.websites',
            'p.date_registration',
            'p.country',
            'p.birthday'
        ]);
        $sql->join([
            [
                'type'  => 'LEFT',
                'table' => TABLE_USERS_PROFILS . ' AS p',
                'on'    => 'u.hash_key = p.hash_key'
            ]
        ]);

        if (!empty($letter)) {
            $letter = strtoupper(substr($letter, 0, 1));
            if (preg_match('/^[A-Z]$/', $letter)) {
                $sql->where([
                    [
                        'name'  => 'u.username',
                        'op'    => 'LIKE',
                        'value' => $letter.'%'
                    ]
                ]);
            }
        }
        return $sql->queryLarge();
    }

    public function getMembers ($name)
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS');
        $sql->where(array('name' => 'username', 'value' => $name));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
}