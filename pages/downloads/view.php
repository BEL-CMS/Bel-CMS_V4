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
use BelCMS\Core\Comment;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

if (file_exists(constant('ROOT') . $data->screen)) {
    $img = $data->screen;
    $img = '<img src="' . $img . '" class="card-img-top" alt="image ' . $data->name . '">';
} else {
    $img = 'assets/img/no_img_fullwide.webp';
    $img = '<img src="' . $img . '" class="card-img-top" alt="image no image">';
}
if (User::ifUserExist($data->uploader)) {
    $uploader = User::getInfosUserAll($data->uploader);
    $color    = User::colorUsername($data->uploader);
    $uploader = $uploader->user->username;
} else {
    $uploader = 'Utilisateur suprimer';
    $color    = '#FFF';
}
?>
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <?= $img; ?>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $data->name; ?></h5>
                <?= $data->description; ?>
            </div>
        </div>
    </div>
</div>
<div class="row g-0">
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <td>Nom</td>
                <td><?= $data->name; ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?= Common::TransformDate($data->date, 'FULL', 'MEDIUM'); ?></td>
            </tr>
            <tr>
                <td>Publié par</td>
                <td style="color: <?= $color; ?>"><?= $uploader; ?></td>
            </tr>
            <tr>
                <td>Taille</td>
                <td><?= Common::ConvertSize($data->size); ?></td>
            </tr>
            <tr>
                <td>Vu</td>
                <td><?= $data->view; ?> vu</td>
            </tr>
            <tr>
                <td>Télécharger</td>
                <td><?= $data->dls; ?> fois</td>
            </tr>
        </tbody>
    </table>
</div>
<?php 
if (!empty($data->download)) {
?>
    <a href="Downloads/getDownload/<?= $data->id; ?>&echo" class="btn btn-info">Télécharger</a>
<?php
}
if (!empty($data->torrent)) {
?>
    <a href="<?= $data->torrent; ?>" class="btn btn-warning">Télécharger le torrent</a>
<?php
}
?>
<?php
$comments = new Comment;
$comments->html();
