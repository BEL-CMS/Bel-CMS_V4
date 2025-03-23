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

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

final class statsUser
{
    protected   $hash_key,
                $last_visit,
                $namepage,
                $link;

    public function __construct ($namepage)
    {
        if (!empty($_SESSION['USER'])) {
            $this->hash_key = $_SESSION['USER']->user->hash_key;
            $dateNow = new \DateTimeImmutable('now');
            $this->last_visit = $dateNow->format('Y-m-d H:i:s');
            $this->namepage = $namepage;
            self::test();
        }
    }
    public function test ()
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS_PAGE');
        $sql->where(array('name' => 'hash_key', 'value' => $this->hash_key));
        $sql->count();
        if ($sql->data <= 1) {
            self::delete();
        } else {
            self::insert();
        }
    }

    public function delete ()
    {
        $sql = new BDD;
        $sql->table('TABLE_USERS_PAGE');
        $sql->where(array('name' => 'hash_key', 'value' => $this->hash_key));
        $sql->delete();
        self::insert();
    }

    public function insert ()
    {
        $data['hash_key']   = $this->hash_key;
        $data['last_visit'] = $this->last_visit;
        $sql = new BDD;
        $sql->table('TABLE_USERS_PAGE');
        $sql->insert($data);
    }

}
