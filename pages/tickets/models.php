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
#    TABLE_TICKET                          #
#    TABLE_TICKET_CAT                      #
#    TABLE_TICKET_REP                      #
############################################
final class Tickets
{
    public function getSubject ()
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET_CAT');
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getSubjectOne($id)
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET_CAT');
        $sql->where(array('name' => 'id', 'value' => $id));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function send ($data)
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET');
        $sql->insert($data);
        $return = $sql->rowCount;
        if ($return === 1){
            return true;
        } else {
            return false;
        }
    }

    public function origin ($hash)
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET');
        $sql->where(array('name' => 'hash', 'value' => $hash));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function msg ($hash)
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET_REP');
        $sql->where(array('name' => 'id_tickets', 'value' => $hash));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getAllTickets ()
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET');
        $sql->where(array('name'=> 'author', 'value' => $_SESSION['USER']->user->hash_key));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
}