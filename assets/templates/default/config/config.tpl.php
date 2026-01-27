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
if (!defined('CHECK_INDEX')) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
}

$menu = array(
    'submenu' => array(
        '<li><a href="Downloads">Téléchargements</a></li>',
        '<li><a href="Members">Membres</a></li>',
        '<li><a href="Links">Liens</a></li>',
        '<li><a href="Gallery">Galerie d\'images</a></li>',
        '<li><a href="Guestbook">Livre d\'or</a></li>',
        '<li><a href="calendar">Calendrier</a></li>'
    )
);
$defilement = array(
    'defilement' => array(
    '<li><a href="#"><span>23 janvier 2026</span>Mise à jour importante</a></li>',
    '<li><a href="#"><span>'.date('d-m-Y').'</span>Bienvenue sur le site</a></li>',
    '<li><a href="#"><span>23 janvier 2026</span>Inscrivez-vous pour accéder à l\'intégralité du contenu.</a></li>'
    )
);
$headerBg = array(
    'background' => 'assets/templates/default/images/bg/bg.jpg'
);
$social = array(
    'facebook'  => 'https://www.facebook.com/Bel.CMS',
    'twitter'   => 'https://x.com/bel_cms',
    'instagram' => '',
    'discord'   => 'https://discord.gg/URtRd4uQYP'
);
$logo = array (
    'logo' => 'assets/img/logo.png'
);
$footer = array (
    'message_left' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Lorem ipsum dolor sit amet, at fierent atomorum usu, ne sit tota ignota, an interpretaris eirmod vix.',
    'submenu' => array(
        '<li><a href="Downloads">Téléchargements</a></li>',
        '<li><a href="Members">Membres</a></li>',
        '<li><a href="Links">Liens</a></li>',
        '<li><a href="Gallery">Galerie d\'images</a></li>',
        '<li><a href="Guestbook">Livre d\'or</a></li>',
    ),
    'contact'  => array(
        '<li><span>e-mail :</span><a href="#" target="_blank">votremail@domain.com</a></li>',
        '<li> <span>Adresse :</span><a href="#" target="_blank">Belgique</a></li>',
        '<li> <span>Téléphone :</span><a href="#" target="_blank">32(0)xx.xx.xx</a></li>',
    ),
    'title'         => 'Application',
    'buttonContact' => '<a href="contact" class="footer-widget-content-link"><span>Contact</span><i class="fa-solid fa-caret-right"></i></a>',
    'application'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.',
    'textapp'       => 'applications Apple Store',
    'textapp2'      => 'applications Google PLay',
);
