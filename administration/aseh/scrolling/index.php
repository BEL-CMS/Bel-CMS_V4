<?php
/**
 * Bel-CMS [Content management system]
 * @version 3.0.6 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license http://opensource.org/licenses/GPL-3.-copyleft
 * @copyright 2015-2024 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;
use BelCMS\User\User;

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

if (isset($_SESSION['LOGIN_MANAGEMENT']) && $_SESSION['LOGIN_MANAGEMENT'] === true):
?>
<form action="aseh/send?management&option=extras" method="post">
	<div class="flex flex-col">
		<div class="">
			<div class="card">
				<div class="card-header">
					<h4>Texte Alert</h4>
				</div>
				<div class="p-6 mb-3">
					<input name="alert" class="form-control" type="text" value="<?=$get->value;?>">
				</div>
				<div class="p-6">
					<button type="submit" class="btn bg-primary text-white"><?=constant('SAVE');?></button>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
endif;