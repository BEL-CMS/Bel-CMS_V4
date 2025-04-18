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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
$user = User::ifUserExist($view->uploader) ? User::getInfosUserAll($view->uploader) : false;
if ($user !== false) {
    $username = $user->user->username;
    $color = $user->user->color;
}
if (is_file($view->screen) == true) {
    $img = $view->screen;
} else {
    $img = 'assets/img/no_dl.jpg';
}
?>
<section id="belcms_downloads">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-xsm-12">
                <div id="belcms_downloads_menu">
                    <div class="card">
                        <div class="card-header title">Les caractéristiques</div>
                        <picture>
                            <img class="glightbox" alt="Image : <?= $view->name; ?>" src="<?= $img; ?>">
                        </picture>
                        <ul id="belcms_downloads_menu_ul">
                            <li><span>Taille : </span><span><?= Common::ConvertSize($view->size); ?></span></li>
                            <li><span>Date : </span><span><?= Common::TransformDate($view->date, 'FULL', 'SHORT'); ?></span></li>
                            <li><span>Auteur : </span><span style="color:<?= $color; ?>"><?= $username; ?></span></li>
                            <li><span>Vu : </span><span><?= $view->view; ?></span>
                            <li><span>Quantité de téléchargements : </span><span><?= $view->dls; ?></span>
                        </ul>
                    </div>
                </div>
            </div>
            <div class=" col-lg-9 col-sm-12 col-xsm-12">
                <div class="card">
                    <div class="card-header title"><?= $view->name; ?></div>
                    <div id="belcms_view_desc">
                        <?= $view->description; ?>
                    </div>
                </div>
                <div class="d-grid gap-2 mt-1">
                    <a href="Downloads/getDownload/<?= $view->id; ?>&echo" class="btn btn-info">Télécharger</a>
                </div>
            </div>
        </div>
    </div>
</section>