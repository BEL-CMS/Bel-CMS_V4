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

namespace BelCMS\Core;

use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

final class like
{
    public  $page,
            $number,
            $user;

    function __construct($page, $number) {
        $this->page   = Common::VarSecure($page);
        $this->number = Common::VarSecure($number, null);
        $this->user   = $_SESSION['USER']->user->hash_key;
        self::fixbugNull();
    }

    public function test ()
    {
        $array[] = array('name' => 'author', 'value' => $this->user);
        $array[] = array('name' => 'name', 'value' => $this->page);
        $array[] = array('name' => 'num', 'value' => $this->number);
        $sql = new BDD;
        $sql->table('TABLE_LIKE');
        $sql->where($array);
        $sql->queryAll();
        $return = $sql->rowCount;
        if ($return >= 2) {
            self::deleteMultipleVote($array);
            return true;
        }
        if ($return == 0) {
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    public function deleteMultipleVote ($array)
    {
        $array[] = array('name' => 'author', 'value' => $this->user);
        $array[] = array('name' => 'name', 'value' => $this->page);
        $array[] = array('name' => 'num', 'value' => $this->number);
        $sql = new BDD;
        $sql->table('TABLE_LIKE');
        $sql->where($array);
        $sql->delete();
    }

    public function send () : bool
    {
        $d['name']   = $this->page;
        $d['num']    = $this->number;
        $d['author'] = $this->user;

        $sql = new BDD;
        $sql->table('TABLE_LIKE');
        $sql->insert($d);
        $return = $sql->rowCount;

        if ($return == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getLikes ()
    {
        $array[] = array('name' => 'name',  'value' => $this->page);
        $array[] = array('name' => 'num',   'value' => $this->number);
        $array[] = array('name' => 'author','value' => $this->user);
        $sql = new BDD;
        $sql->table('TABLE_LIKE');
        $sql->where($array);
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function fixbugNull ()
    {
        $sql = new BDD;
        $sql->table('TABLE_LIKE');
        $sql->where(array('name' => 'num', 'value' => 0));
        $sql->delete();
        self::fixbugNullM();
    }
    public function fixbugNullM ()
    {
        $sql = new BDD;
        $sql->table('TABLE_LIKE');
        $sql->where(array('name' => 'num', 'value' => null));
        $sql->delete();
    }
}