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

namespace BelCMS\Core;

use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
#####################################
# Infos tables
#####################################
# TABLE_FORBIDEN_WORD
#####################################
final class forbidden
{
    public function getforbidden ()
    {
        $sql = new BDD;
        $sql->table('TABLE_FORBIDEN_WORD');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
    public static function replaceWordForbiden ($word)
    {
        $word = Common::RemoveAccents($word);
        $word = strtolower($word);
        $forbidden = self::getforbidden();
        foreach ($forbidden as $key => $value) {
            $word = str_replace($word, $value->word, $value->wordgood);
        }
        return $word;
    }

    public static function addWordReplace ($word, $replace)
    {
        $data['word']     = Common::VarSecure($word);
        $data['wordgood'] = Common::VarSecure($replace);
        $sql = new BDD;
        $sql->table('TABLE_FORBIDEN_WORD');
        $sql->insert($data);
        if ($sql->rowCount == 1) {
            return true;
        } else {
            return false;
        }
    }
}
