<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
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
return $config = array (
    'logo'            => 'assets/templates/default/images/logo.png',
    'name_wel'        => $_SESSION['CONFIG']['CMS_NAME'],
    'background_link' => 'assets/templates/default/images/bg/1.jpg',
    'welcome'         => 'Bienvenue sur le site',
    'loader'          => 'fa-section',
    'facebook'        => 'BelCMS.DEV',
    'facebook_api'    => '1310664130412580',
    'social_facebook' => 'https://www.facebook.com/BelCMS.DEV',
    'social_web'      => 'https://www.bel-cms.dev',
    'social_x'        => 'https://x.com/BelCMS',
    'social_discord'  => 'https://discord.gg/ut4XFcPpmS',
    'whatsapp'        => '+32(0)455.12.34.56',
    'footer_name'     => 'Bel-CMS',
    'about'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eaque ipsa quae ab illo inventore veritatis et quasi architecto. Consectetur adipiscing elit.',
    'tel'             => '+32(0)455 12 34 56',
    'mail'            => 'contact@bel-cms.dev',
    'country'         => 'Belgique',
    'link_roi'        => '',
    'rgpd'            => '',
    'policy'          => '',

);