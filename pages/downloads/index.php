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

use BelCMS\User\User as User;

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<article id="section_downloads">
	<ul id="section_download_jquery">
		<li id="downloads_title">
			<h2><?=constant('DOWNLOADS');?></h2>
			<div class="downloads_title_cat"><?=constant('NB_CAT');?></div>
			<div class="downloads_title_view"><?=constant('NB_VIEW');?></div>
		</li>
		<?php
		foreach ($data as $key => $value):
		?>
		<li class="downloads_li_content">
			<h3><a href="Downloads/detail/<?=$value->id;?>"><?=$value->name;?></a><span><?=$value->description;?></span></h3>
			<div><span><?=$value->dls;?></span></div>
			<div><span><?=$value->view;?></span></div>
		</li>
		<?php
		endforeach;
		?>
	</ul>
</article>