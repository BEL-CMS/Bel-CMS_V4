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

use BelCMS\Core\Config;
use BelCMS\Core\Dispatcher;
use BelCMS\Core\Security;
use BelCMS\Core\User;
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
    public function getCat () : array
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->queryAll();
        foreach ($sql->data as $key => $value) {
           $sql->data[$key]->view = self::getNbViewAll($value->id);
           $sql->data[$key]->dls  = self::getNbDlAll($value->id);
        }
        $return = $sql->data;
        return $return;
    }

    private function getNbViewAll ($id = false) : int
    {
        $i = 0;
        $id = (int) $id;
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->where(array('name' => 'idcat', 'value' => $id));
        $sql->queryAll();
        foreach ($sql->data as $v) {
            $i = $v->view + $i;
        }
        return $i;
    }

    private function getNbDlAll ($id = false) : int
    {
        $i = 0;
        $id = (int) $id;
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->where(array('name' => 'idcat', 'value' => $id));
        $sql->queryAll();
        foreach ($sql->data as $v) {
            $i = $v->dls + $i;
        }
        return $i;
    }

    public function detail ($id) : array
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->where(array('name' => 'idcat', 'value' => $id));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getNameCat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->fields(array('name'));
        $sql->queryOne();
        $return = $sql->data;
        $return = $return->name;
        return $return;
    }


    public function ifAccess ($id)
    {
        if ($id !== null && is_numeric($id)) {
            $sql = New BDD();
            $sql->table('TABLE_DOWNLOADS');
            $id = (int) $id;
            $where = array(
                'name' => 'id',
                'value' => $id
            );
            $sql->where($where);
            $sql->queryOne();
            $return = $sql->data;

            $sqlCat = New BDD();
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
    
    public function NewView ($id = false)
    {
        if ($id) {
            $id  = Common::secureRequest($id);
            $get = New BDD();
            $get->table('TABLE_DOWNLOADS');
            $where = array(
                'name'  => 'id',
                'value' => (int) $id
            );
            $get->where($where);
            $get->queryOne();
            $data = $get->data;
            if ($get->rowCount != 0) {
                $count = (int) $data->view;
                $count++;
                $update = New BDD();
                $update->table('TABLE_DOWNLOADS');
                $update->where($where);
                $update->update(array('view' => $count));
            }
        }
    }
    
    public function AddDownload ($id = false)
    {
        if ($id) {
            $id  = Common::secureRequest($id);
            $get = New BDD();
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
                $update = New BDD();
                $update->table('TABLE_DOWNLOADS');
                $update->where($where);
                $update->update(array('dls' => $count));
            }
        }
    }
	public function getDownloads ($id = null)
	{
		if ($id !== null && is_numeric($id)) {
			$sql = New BDD();
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

    public function view ($id) : object
    {
        $sql = new BDD;
        $sql->table('TABLE_DOWNLOADS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

}