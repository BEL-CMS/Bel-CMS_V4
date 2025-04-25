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

namespace BelCMS\Core;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

##################################################################
#   $msg = 'Explication des raisons pour lesquelles une entrée####
#   a été ajoutée dans la base de données.'#######################
##################################################################
/*
$msg   = $_SESSION['USER']->user->username . ' à modifier les paramètres de l\'utilisateur ' . $update['username'];
#######################################################
$interaction = new Interaction();
$interaction->status('red', 'blue', 'green', 'orange', 'grey');
$interaction->message($msg);
$interaction->title('Titre de l'interaction');
$interaction->author($_SESSION['USER']->user->hash_key);
$interaction->set();
#######################################################
*/

final class Interaction
{
    public  $date,
            $agent,
            $author,
            $msg,
            $status,
            $title,
            $time;
    #########################################
    # TABLE_INTERACTION
    #########################################
    function __construct()
    {
        $dateNow = new \DateTimeImmutable('now');
        $this->date  = $dateNow->format('Y-m-d H:i:s');
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
    }

    public function author ($author = false)
    {
        if (strlen($author) == 32) {
            $this->author = $author;
        } else {
            $this->author = Common::GetIp();
        }
    }

    public function title ($title)
    {
        $this->title = Common::VarSecure($title, null);
    }

    public function message ($msg)
    {
        $this->msg = Common::VarSecure($msg, 'html');
    }

    public function status ($data)
    {
        switch ($data) {
            case 'red':
                $this->status = 'red';
            break;

            case 'blue':
                $this->status = 'blue';
            break;

            case 'green':
                $this->status = 'green';
            break;

            case 'orange':
                $this->status = 'orange';
            break;

            case 'grey':
                $this->status = 'grey';
            break;

            default:
                $this->status = 'grey';
            break;
        }
    }

    public function time ($time = 'PT1H')
    {
        $this->time = Common::VarSecure($time, null);
    }

    public function machine ()
    {
        $user = $this->agent;

        if (stristr($user, 'Macintosh')) {
            $machine = "Mac";
        } elseif (stristr($user, 'Win')) {
            $machine = "PC";
        } elseif (stristr($user, 'iPhone')) {
            $machine = "iPhone";
        } elseif (stristr($user, 'iPod')) {
            $machine = "iPod";
        } elseif (stristr($user, 'Android')) {
            $machine = "Android";
        } elseif (stristr($user, 'iPad')) {
            $machine = "iPad";
        } else {
            $machine = "Linux";
        }
        return $machine;
    }

    public function getIP ()
    {
        return Common::GetIp();
    }

    public function navigateur ()
    {
        $user = $this->agent;

        if (stristr($user, 'Chrome')) {
            $navigateur = "Chrome";
        } elseif (stristr($user, 'Camino')) {
            $navigateur = "Camino";
        } elseif (stristr($user, 'Firefox')) {
            $navigateur = "Firefox";
        } elseif (stristr($user, 'Safari')) {
            $navigateur = "Safari";
        } elseif (stristr($user, 'MSIE')) {
            $navigateur = "Explorer";
        } elseif (stristr($user, 'Opera')) {
            $navigateur = "Opera";
        } elseif (stristr($user, 'Epiphany')) {
            $navigateur = "Epiphany";
        } elseif (stristr($user, 'ChromePlus')) {
            $navigateur = "ChromePlus";
        } elseif (stristr($user, 'Lynx')) {
            $navigateur = "Lynx";
        } else {
            $navigateur = "Inconnu";
        }
        return $navigateur;
    }

    public function referer ()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return $_SERVER['HTTP_REFERER'];
        } else {
            return 'Visite direct';
        }
    }

    public function set()
    {
        $insert['author']      = $this->author;
        $insert['title']       = $this->title;
        $insert['message']     = $this->msg;
        $insert['status']      = $this->status;
        $insert['IP']          = self::getIP();
        $insert['machine']     = self::machine();
        $insert['navigateur']  = self::navigateur();
        $insert['referer']     = self::referer();
        $insert['date_insert'] = $this->date;

        $sql = new BDD;
        $sql->table('TABLE_INTERACTION');
        $sql->insert($insert);
    }

    public function setAdmin ()
    {
        $insert['author']      = $this->author;
        $insert['title']       = $this->title;
        $insert['message']     = $this->msg;
        $insert['status']      = $this->status;
        $insert['IP']          = self::getIP();
        $insert['machine']     = self::machine();
        $insert['navigateur']  = self::navigateur();
        $insert['referer']     = self::referer();
        $insert['date_insert'] = $this->date;

        $sql = new BDD;
        $sql->table('TABLE_INTERACTION_ADMIN');
        $sql->insert($insert);

        if ($this->status == 'red') {
            Ban::addBan($insert['author'], Common::GetIp(), null, $this->time,$insert['message']);
        } else if ($this->status == 'orange') {
            Ban::addBan($insert['author'], Common::GetIp(), null, $this->time, $insert['message']);
        }
    }

    public function get ($hash_key = false)
    {
        $sql = new BDD;
        $sql->table('TABLE_INTERACTION_ADMIN');
        if ($hash_key != false) {
            $where[] = array('name' => 'author', 'value' => $hash_key);
            $sql->where($where);
        }
        $sql->queryAll();
        $return = $sql->data;
        return $return;
    }
}