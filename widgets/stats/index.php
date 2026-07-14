<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;
use BelCMS\Core\User;
use BelCMS\Core\Visitors;


if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
$countPage = number_format($page, 0, ',', '.');
$visitor = Visitors::dataVisitors();
//debug($visitor);
?>
<div id="bel_cms_widgets_connected" class="widget">
	<p>Pages vues <b><i><?=$countPage;?></i></b>  depuis le <br><?=Common::TransformDate($_SESSION['CONFIG']['CMS_DATE_INSTALL'], 'FULL', 'MEDIUM');?></p>
	<ul id="widgets_users">
		<li>Membres<span><?= $users; ?></span></li>
		<li>News<span><?= $news; ?></span></li>
		<li>Articles<span><?= $articles; ?></span></li>
		<li>Commentaire<span><?= $comments; ?></span></li>
		<li>Fichiers<span><?= $files; ?></span></li>
		<li>Liens<span><?= $links; ?></span></li>
		<li>Images<span><?= $img; ?></span></li>
	</ul>
	<ul>
		<li>
			<span>Cette année</span>
			<span><strong><?= $visitor['visitorsYear']; ?></strong></span>
		</li>
		<li>
			<span>Durant le mois en cours</span>
			<span><strong><?= $visitor['visitorsMonth']; ?></strong></span>
		</li>
		<li>
			<span>Aujourd'hui</span>
			<span><strong><?= $visitor['visitorsToday'];?></strong></span>
		</li>
		<li>
			<span>Maintennant</span>
			<span><strong><?= $visitor['visitors']; ?></strong></span>
		</li>
		<li>
			<span>Les robots / bots</span>
			<span><strong><?= $visitor['visitorsBots']; ?></strong></span>
		</li>
		<li><span style="display: block;width:100%;font-weight: bold;text-align:center;">Les membres</span></li>
		<li>
			<ul style="list-style: none;">
			<?php
			foreach ($visitor['users'] as $key => $value):
				$flag = strtolower($value['country']);
				if ($value['is_bot'] == 1) {
					$username = 'Bot';
				} else if ($value['is_bot'] == 0 and empty($value['username'])) {
					$username = 'Visiteur';
				} else {
					$username = $value['username'];
				}
				$value['page'] = strtoupper($value['page']);
				$value['page'] = defined($value['page']) ? constant($value['page']) : $value['page'];
			?>
			<li class="belcms_flags">
				<img src="assets/img/country/<?= $flag;?>.png" class="belcms-flag" alt="pays_<?= $value['country']; ?>"> <i><?= $username; ?></i>
				<span style="text-align: right;float:right;display:block"><?= $value['page']; ?></span>
			</li>
			<?php
			endforeach;
			?>
			</ul>
		</li>
	</ul>
</div>