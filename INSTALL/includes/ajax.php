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
	header('Content-Type: application/json');
	$ajax = Array(
		'articles',
		'articles_content',
		'ban',
		'buy_mails',
		'buy_ndd',
		'buy_plan',
		'buy_plan_infos',
		'buy_users',
		'captcha',
		'comments',
		'config',
		'config_pages',
		'contact',
		'contact_cat',
		'downloads',
		'downloads_cat',
		'events',
		'events_cat',
		'forum',
		'forum_msg',
		'forum_name',
		'forum_threads',
		'gallery',
		'gallery_cat',
		'gallery_sub_cat',
		'gallery_vote',
		'groups',
		'guestbook',
		'inbox',
		'inbox_msg',
		'interaction',
		'interaction_admin',
		'like',
		'links',
		'links_cat',
		'mails_blacklist',
		'mails_config',
		'maintenance',
		'news',
		'newsletter',
		'newsletter_send',
		'newsletter_tpl',
		'news_cat',
		'shoutbox',
		'stats',
		'templates',
		'tickets',
		'users',
		'users_gaming',
		'users_groups',
		'users_hardware',
		'users_page',
		'users_profils',
		'users_social',
		'visitors',
		'visitors_online',
		'visitors_stats',
		'widgets'
	);
	echo json_encode($ajax);