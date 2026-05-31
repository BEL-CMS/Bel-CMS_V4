<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Forbidden extends AdminPages
{
    var $admin  = true; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsForbidden'; // Nom du Models (récupération de données)

	public function index ()
	{
        $menu[] = array('title' => 'Accueil', 'href' => 'forbidden?Admin&option=extras', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => 'Ajouter un mail', 'href' => 'forbidden/add?Admin&option=extras', 'ico'  => 'fa-solid fa-pen-to-square');
		$a['mails'] = $this->models->getMails();
		$this->set($a);
		$this->render('index', $menu);
	}

	public function add ()
	{
		$this->render('add');
	}

	public function sendnew ()
	{
		$mail = Common::VarSecure($_POST['mail'], null);
		$mail = str_replace('@', '', $mail);

		$row = $this->models->testName($mail);

		if ($row === true) {
			$this->models->sendNew ($mail);
			$array = array(
				'type' => 'success',
				'text' => 'E-mail enregistré.'
			);
			$this->error('e-mail', $array['text'], $array['type']);

			$this->redirect('forbidden?admin&option=extras', 3);
		} else {
			$array = array(
				'type' => 'error',
				'text' => 'E-mail déjà enregistré.'
			);

			$this->error('e-mail', $array['text'], $array['type']);
			$this->redirect('forbidden/add?admin&option=extras', 3);
		}
	}
}