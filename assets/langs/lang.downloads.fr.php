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


namespace BELCMS\LANG;
use BelCMS\Requires\Common as Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

Common::constant(array(
	#####################################
	# Fichier lang en français - Téléchargements
	#####################################
	'DOWNLOAD'         => 'Téléchargement',
	'DOWNLOADS'        => 'Téléchargements',
	'CAT'              => 'Catégorie',
	'SIZE'             => 'Taille',
	'DOWNLOADING'      => 'Téléchargement en cours',
	'NO_DL'            => 'Aucun téléchargement ?',
	'HASH_MD5'         => 'Hash MD5',
	'DOWNLOAD_COUNTER' => 'Compteur DL',
	'COUNTER_SEEN'     => 'Compteur vu',
	'MIME_TYPE'        => 'Type Mime',
	'RELEASE_DATE'     => 'Date de parution',
	'UPLOADER'         => 'Mise en ligne par',
	'NO_DL_CAT'        => 'Aucun téléchargement dans cette catégorie',
	'INVALID_DL'       => 'Tentative d\'accès au téléchargement interdit',
	'NB_CAT'           => 'Nombre de téléchargement',
	'NB_VIEW'          => 'Nombre de vu',
	'DETAILS'          => 'Détails',
	'ADD_INFOS'        => 'Information additionnelle',
));