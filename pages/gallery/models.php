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
use BelCMS\Core\Config;
use BelCMS\Core\Dispatcher;
use BelCMS\Core\GetHost;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#  TABLE_GALLERY
#  TABLE_GALLERY_CAT
############################################
final class Gallery
{
    public function getCategory ()
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_CAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getImg ($id)
    {
        $where[] = array('name' => 'valid', 'value' => 1);
        $where[] = array('name' => 'id_cat', 'value' => $id);
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->where($where);
        $config = Config::GetConfigPage('gallery');
        if (isset($config->config['MAX_PAGE'])) {
            $nbpp = (int) $config->config['MAX_PAGE'];
        } else {
            $nbpp = (int) 6;
        }
        $page = (Dispatcher::RequestPages() * $nbpp) - $nbpp;
        $sql->orderby(array(array('name' => 'id', 'type' => 'DESC')));
        $sql->limit(array(0 => $page, 1 => $nbpp), true);
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getImgNew()
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->orderby(array(array('name' => 'id', 'type' => 'ASC')));
        $sql->limit(6);
        $sql->where(array('name' => 'valid', 'value' => 1));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function insertTmp ($data)
    {
        $insert['url'] = $data['image'];
        $insert['name'] = $data['name'];
        $insert['description'] = $data['description'];
        $insert['author'] = User::isLogged() ? $_SESSION['USER']->user->hash_key : Common::GetIp();
        $insert['valid'] = 0;
        if (User::isLogged()) {
            $sql = new BDD;
            $sql->table('TABLE_GALLERY');
            $sql->insert($insert);
        }
    }

    public function addVote ($insert)
    {
        $where[]  = array('name' => 'num',    'value' => $insert['num']);
        $where[]  = array('name' => 'name',   'value' => $insert['name']);
        $where[]  = array('name' => 'author', 'value' => $insert['author']);
        $sql = new BDD;
        $sql->table('TABLE_LIKE');
        $sql->where($where);
        $sql->count();
        $return = $sql->data;
        if ($return != 0) {
            $message['msg']  = 'Vous avez déjà fait entendre votre voix en votant.';
            $message['type'] = 'error';
        } else {
            $new = new BDD;
            $new->table('TABLE_LIKE');
            $new->insert($insert);
            $message['msg']  = 'Vous avez participé au vote.';
            $message['type'] = 'error';
        }
        return $message;
    }

     public function getVote ($id)
    {
        $where[]  = array('name' => 'num', 'value'    => $id);
        $where[]  = array('name' => 'name', 'value'   => 'gallery');
        $sql = new BDD;
        $sql->table('TABLE_LIKE');
        $sql->where($where);
        $sql->count();
        if ($sql->data == 0) {
            $return = 0;
        } else {
            $return = $sql->data;
        }
        return $return;
    }
}