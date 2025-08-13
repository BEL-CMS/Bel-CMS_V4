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

use BelCMS\Core\Security;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

############################################
#  TABLE_DOWNLOADS
#  TABLE_DOWNLOADS_CAT
############################################
final class Downloads
{
    public function allGetCat () : array
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->orderby(array(array('name' => 'name', 'type' => 'ASC')));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getDlForID ($id)
    {
        $where = array('name' => 'id', 'value' => $id);
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->where($where);
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }


    public function getAllDlForID ($id)
    {
        $where = array('name' => 'id_groups', 'value' => $id);
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->orderby(array(array('name' => 'name', 'type' => 'ASC')));
        $sql->where($where);
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getDownloads($id = null)
    {
        if ($id !== null && is_numeric($id)) {
            $sql = new BDD();
            $sql->table('TABLE_DOWNLOADS');
            $id = (int) $id;
            $where = array(
                'name' => 'id',
                'value' => $id
            );
            $sql->where($where);
            $sql->queryOne();
            $return = $sql->data;

            self::AddDownload($id);

            return $return->download;
        }
        
    }

    public function AddDownload($id)
    {
        if ($id) {
            $id  = Common::secureRequest($id);
            $get = new BDD();
            $get->table('TABLE_DOWNLOADS');
            $where = array(
                'name'  => 'id',
                'value' => (int) $id
            );
            $get->where($where);
            $get->queryOne();
            $data = $get->data;
            if ($get->rowCount != 0) {
                $count = (int) $data->dls;
                $count++;
                $update = new BDD();
                $update->table('TABLE_DOWNLOADS');
                $update->where($where);
                $update->update(array('dls' => $count));
            }
        }
    }

    public function viewAdd ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $view = $sql->data;
        $view = $view->view;
        $addView['view'] = $view + 1;
        $update = new BDD;
        $update->table('TABLE_DOWNLOADS');
        $update->update($addView);
    }

    public function ifAccess($id)
    {
        if ($id !== null && is_numeric($id)) {
            $sql = new BDD();
            $sql->table('TABLE_DOWNLOADS');
            $id = (int) $id;
            $where = array(
                'name' => 'id',
                'value' => $id
            );
            $sql->where($where);
            $sql->queryOne();
            $return = $sql->data;

            $sqlCat = new BDD();
            $sqlCat->table('TABLE_DOWNLOADS_CAT');
            $idCatwhere = array(
                'name' => 'id',
                'value' => $return->idcat
            );
            $sqlCat->where($idCatwhere);
            $sqlCat->queryOne();
            $returnCat = $sqlCat->data;
        }
        if (Security::isAcess($returnCat->id_groups) == true) {
            return true;
        } else {
            return false;
        }
    }
}