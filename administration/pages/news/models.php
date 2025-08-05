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

#####################################
# Infos tables                      #
#####################################
# TABLE_NEWS                        #
# TABLE_NEWS_CAT                    #
#####################################
final class ModelsNews
{
    public function getNews ()
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS');
        $sql->queryAll();
        return $sql->data;
    }

    public function getCat ()
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS_CAT');
        $sql->queryAll();
        return $sql->data;
    }

    public function getCatforID($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        return $sql->data;
    }

    public function addCat ($name)
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS_CAT');
        $sql->insert($name);
    }

    public function sendEditCat ($id, $value)
    {
        $update['value'] = $value;
        $sql = new BDD;
        $sql->table('TABLE_NEWS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($update);
    }

    public function deleteCat ($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->delete();
    }

    public function verifNameGroup ($name) : bool
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS_CAT');
        $sql->where(array('name' => 'value', 'value' => $name));
        $sql->count();
        $count = $sql->data;
        if ($count != 0) {
            $return = false;
        } else {
            $return = true;
        }
        return $return;
    }

    public function sendNew (array $data)
    {
        if ($data !== false) {
            // SQL INSERT
            $sql = New BDD();
            $sql->table('TABLE_NEWS');
            $sql->insert($data);
            // SQL RETURN NB INSERT
            if ($sql->rowCount == 1) {
                $return = array(
                    'type' => 'success',
                    'text' => constant('SEND_BLOG_SUCCESS')
                );
            } else {
                $return = array(
                    'type' => 'warning',
                    'text' => constant('SEND_BLOG_ERROR')
                );
            }
        } else {
            $return = array(
                'type' => 'warning',
                'text' => constant('ERROR_NO_DATA')
            );
        }

        return $return;
    }

    public function getnewsforid ($id = false)
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        return $sql->data;
    }

    public function sendedit ($data, $id)
    {
        $sql = new BDD;
        $sql->table('TABLE_NEWS');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->update($data);
        if ($sql->rowCount == 1) {
            $return = array(
                'type' => 'success',
                'text' => constant('EDIT_BLOG_SUCCESS')
            );
            } else {
            $return = array(
                'type' => 'warning',
                'text' => constant('EDIT_BLOG_ERROR')
            );
            }
            return $return;
   }

    public function delete($data = false)
    {
        if ($data !== false) {
            // SECURE DATA
            $delete = (int) $data;
            // SQL DELETE
            $sql = new BDD();
            $sql->table('TABLE_NEWS');
            $sql->where(array('name' => 'id', 'value' => $delete));
            $sql->delete();
            // SQL RETURN NB DELETE
            if ($sql->rowCount == true) {
                $return = array(
                    'type' => 'success',
                    'text' => constant('DEL_BLOG_SUCCESS')
                );
            } else {
                $return = array(
                    'type' => 'warning',
                    'text' => constant('DEL_BLOG_ERROR')
                );
            }
        } else {
            $return = array(
                'type' => 'error',
                'text' => constant('ERROR_NO_DATA')
            );
        }
        return $return;
    }
    public function sendparameter($data = null)
    {
		$sql = New BDD();
		$sql->table('TABLE_CONFIG_PAGES');
		$sql->where(array('name' => 'name', 'value' => 'news'));
		$sql->update($data);
        if ($sql->rowCount == 1) {
            $return = array(
                'type' => 'success',
                'text' => constant('EDIT_BLOG_PARAM_SUCCESS')
            );
        } else {
            $return = array(
                'type' => 'warning',
                'text' => constant('EDIT_BLOG_PARAM_ERROR')
            );
        }
        return $return;
    }
}