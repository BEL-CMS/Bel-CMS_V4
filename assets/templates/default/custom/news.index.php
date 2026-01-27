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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
foreach ($news as $key => $data):
?>
<div class="boxed-content">
	<div class="boxed-content-title">
		<h3><?= $data->name; ?></h3>
	</div>
	<div class="boxed-content-item">
		<div class="text-block post-single_tb">
			<div class="post-card-details" style="margin-bottom: 20px;">
				<ul>
					<li><i class="fa-light fa-calendar-days"></i><span><?= Common::TransformDate($data->date_create, 'MEDIUM', 'MEDIUM'); ?></span></li>
					<li><i class="fa-light fa-comment"></i><span>2 comments</span></li>
				</ul>
				<div class="pv-item_wrap pv-item_wrap_single"><i class="fa-light fa-glasses"></i><span> Viewed - <strong>59</strong></span></div>
			</div>
			<div class="text-block-container">
			<?php
            echo $data->content;
            ?>
			</div>
			<div class="tagcloud_single">
				<span class="tc_single_title"><i class="fa-regular fa-tag"></i>Post Tags:</span>
				<div class="tags-widget">
					<a href="#">Hotel</a>
					<a href="#">Hostel</a>
					<a href="#">Room</a>
					<a href="#">Photography</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
endforeach;
echo $pagination;