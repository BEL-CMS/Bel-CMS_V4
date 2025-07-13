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

namespace Belcms\Pages\Models;
use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
############################################
#  TABLE_ARTICLES
#  TABLE_ARTICLES_CONTENT
############################################
final class Articles
{
    public function getArticles ()
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getCategory ($hash)
    {
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES_CONTENT');
        $sql->where(array('name' => 'id_articles', 'value' => $hash));
        $sql->orderby(array(array('name' => 'pagenumber', 'type' => 'ASC')));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getArticlesContent ($hash, $number)
    {
        $where[] = array('name' => 'id_articles', 'value' => $hash);
        $where[] = array('name' => 'pagenumber', 'value' => $number);
        $sql = new BDD;
        $sql->table('TABLE_ARTICLES_CONTENT');
        $sql->where($where);
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }
}