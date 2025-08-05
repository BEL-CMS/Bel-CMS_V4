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

############################################
#    Infos tables                          #
############################################
#    TABLE_TICKET                          #
#    TABLE_TICKET_CAT                      #
#    TABLE_TICKET_REP                      #
############################################
final class ModelsTickets 
{
    public function getTickets ()
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET');
        $sql->orderby(array(array('name' => 'status', 'type' => 'ASC')));
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }

    public function getTicket ($hash)
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET');
        $sql->where(array('name' => 'hash', 'value' => $hash));
        $sql->queryOne();
        $return = $sql->data;
        return $return;
    }

    public function msg($hash)
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET_REP');
        $sql->where(array('name' => 'id_tickets', 'value' => $hash));
        $sql->orderby(array(array('name' => 'id', 'type' => 'ASC')));
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

    public function reply ($array)
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET_REP');
        $sql->insert($array);
        $return = $sql->rowCount;
        if ($return == 1) {
            $hash = $array['id_tickets'];
            $upd['status'] = 1;
            $update = new BDD('TABLE_TICKET');
            $update->table('TABLE_TICKET');
            $update->where(array('name' => 'hash', 'value' => $hash));
            $update->update($upd);
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }
    #######################################
    # efface tous les messages du tickets #
    #######################################
    public function deleteAll ($hash)
    {
        $sql = new BDD;
        $sql->table('TABLE_TICKET');
        $sql->where(array('name' => 'hash', 'value' => $hash));
        $sql->delete();
        #######################################
        $del = new BDD;
        $del->table('TABLE_TICKET_REP');
        $del->where(array('name' => 'hash', 'value' => $hash));
        $del->delete();
    }
    public function read ($hash)
    {
        $upd['status'] = 1;
        $update = new BDD('TABLE_TICKET');
        $update->table('TABLE_TICKET');
        $update->where(array('name' => 'hash', 'value' => $hash));
        $update->update($upd);
    }
}