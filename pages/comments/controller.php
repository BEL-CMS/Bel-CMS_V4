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

namespace Belcms\Pages\Controller;

use BelCMS\Core\Notification;
use BelCMS\Core\Pages;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Comments extends Pages
{
	var $useModels = 'Comments';

	public function send ()
	{
		if (isset($_SESSION['USER']->user->hash_key) and strlen($_SESSION['USER']->user->hash_key) == 32) {
			if (empty($_POST['text'])) {
				Notification::error(constant('COMMENT_EMPTY'),'Commentaires');
			}
			if (empty($_POST['url'])) {
				Notification::error(constant('URL_EMPTY'),'Commentaires');
			}
			$insert = $this->models->insertComment($this->data);
			if ($insert === false) {
				Notification::error( $insert['text'], 'Commentaires');
			} else {
				Notification::success( $insert['text'], 'Commentaires');
			}
		}
		$referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'news';
		$this->redirect($referer, 3);
	}
}
