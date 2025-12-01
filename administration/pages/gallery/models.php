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

use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

#####################################
# Infos tables                      #
#####################################
# TABLE_GALLERY                     #
# TABLE_GALLERY_CAT                 #
# TABLE_GALLERY_SUBCAT              #
#####################################
final class ModelsGallery
{
    public function getGallery ()
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->where(array('name' => 'valid', 'value' => 1));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function cat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_CAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getcat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getIdcat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getIdcatToken ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_CAT');
        $sql->where(array('name' => 'cat_id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function groups ()
    {
        $sql = new BDD;
        $sql->table('TABLE_GROUPS');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function addCat ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_CAT');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function editCat ($data, $id)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function addNew ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function delimg ($id)
    {
        $del = new BDD;
        $del->table('TABLE_GALLERY');
        $del->where(array('name' => 'id', 'value' => $id));
        $del->queryOne();
        $a = $del->data;
        #####################################
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        #####################################
        $return = $sql->rowCount;
        if ($return == 1) {
            //Common::deleteFiles($a->url);
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function deletecat($id)
    {
        $del = new BDD;
        $del->table('TABLE_GALLERY_CAT');
        $del->where(array('name' => 'id', 'value' => $id));
        $del->queryOne();
        $a = $del->data;
        #####################################
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        #####################################
        $return = $sql->rowCount;
        if ($return == 1) {
            //@unlink($a->background);
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function getimg($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = $sql->data;
        } else {
            $return = false;
        }
        return $return;
    }

    public function sendedit ($data, $id)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function read ($hash)
    {
        $upd['status'] = 1;
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->where(array('name' => 'hash', 'value' => $hash));
        $sql->update($upd);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function subcat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_SUBCAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function delsubcat ($id) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_SUBCAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
        #####################################
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function sendnewsubcat ($data) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_SUBCAT');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function getNameCat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_SUBCAT');
        $sql->where(array('name' => 'cat_id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function getCountImg ($id): int
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY');
        $sql->where(array('name' => 'cat_id', 'value' => $id));
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function getSubCat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_SUBCAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getSubCatOne ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_SUBCAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function sendeditsubcat ($data, $id): bool
    {
        $sql = new BDD;
        $sql->table('TABLE_GALLERY_SUBCAT');
        $sql->where(array('name'=> 'id', 'value' => $id));
        $sql->update($data);
        $return = $sql->rowCount;
        if ($return == 1) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }
}