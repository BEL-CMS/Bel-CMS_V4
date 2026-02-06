<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Secure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class banishment extends AdminPages
{
    var $admin  = true;
    var $active = true;
    var $bdd    = 'BanModels';

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'banishment?admin&option=users', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter un bannissement', 'href' => 'banishment/add?admin&option=users', 'ico'  => 'fa-solid fa-pen-to-square');

        $d['data'] = $this->models->getBan();
        $this->set($d);
        $this->render('index', $menu);
    }

    public function add()
    {
        $d['users'] = $this->models->getUsers();
        $this->set($d);
        $this->render('add');   
    }

    public function sendadd ()
    {
        $_POST['date']   = Secure::isString($_POST['date']);
        $_POST['author'] = strlen($_POST['author']) == 32 ? $_POST['author'] : '';
        $_POST['ip'] = Secure::isString($_POST['ip']);
        $_POST['email'] = Secure::isMail($_POST['email']);
		// Recherche un auteur & email & ip ou rien.
		if ($_POST['author'] != false and $_POST['email'] != false and $_POST['ip'] != false) {
			$where   = 'WHERE 1 AND `author` = "'.$_POST['author'].'" or `email` = "'.$_POST['email']
            .'" or `ip` = "'.$_POST['ip'].'"';
		} elseif ($_POST['author'] == false and $_POST['email'] == false and $_POST['ip'] == false) {
			$where = false;
		} else if ($_POST['author'] == false and $_POST['email'] == false and $_POST['ip'] != false) {
			$where  = 'WHERE 1 AND `ip` = "'.$_POST['ip'].'"';
		} else if ($_POST['author'] == false and $_POST['email'] != false and $_POST['ip'] == false) {
			$where  = 'WHERE 1 AND `email` = "'.$_POST['email'].'"';
		} else if ($_POST['author'] != false and $_POST['email'] == false and $_POST['ip'] == false) {
			$where  = 'WHERE 1 AND `author` = "'.$_POST['author'].'"';
		} else {
			$where  = false;
		}
        $this->models->deleteBan($where);

		// Initialise le time du ban.
		$current = new DateTime('now');
		$date    = $current->format('Y-m-d H:i:s');

		$current->add(new DateInterval($_POST['date']));
		$endban  = $current->format('Y-m-d H:i:s');
		$timeban = $_POST['date'];

        // Impossible de s'autobannir par nom (logiquement impossible, vu qu'il ne se trouve pas dans la liste)...).
		if ($_POST['author'] == $_SESSION['USER']->user->username or $_POST['ip'] == Common::GetIp()) {
			return array(
				'type' => 'error',
				'text' => constant('IMPOSSIBLE_TO_BAN_YOURSELF')
			);
		}

        $d['who']     = $_SESSION['USER']->user->hash_key;
        $d['author']  = $_POST['author'];
        $d['date']    = $date;
        $d['endban']  = $endban;	
        $d['timeban'] = $timeban;	
        $d['reason']  = Common::VarSecure($_POST['reason'], 'html');
        $d['number']  = 0;

        $this->models->addBan($d['author'], $_POST['ip'], $_POST['email'], $d['date'], $d['endban'], $d['timeban'], $d['reason']);
    }
}