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

if (file_exists($data->screen)) {
    $img = $data->screen;
    $img = '<img src="'.$img.'" class="card-img-top" alt="image '.$data->name.'">';
} else {
    $img = 'assets/img/no_img_fullwide.webp';
    $img = '<img src="'.$img.'" class="card-img-top" alt="image no image">';
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
<section id="belcms_downloads">
    <div class="card mb-3" style="width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <?=$img;?>
            </div>
            <div class="col-md-8">
                <div class="card-body no_margin">
                    <table class="belcms_downloads_table">
                        <tr>
                            <td>Nom :</td>
                            <td>t<?= $data->name; ?></td>
                        </tr>
                        <tr>
                            <td>Publié par :</td>
                            <td style="color: <?=$color;?>"><?= $uploader; ?></td>
                        </tr>
                        <tr>
                            <td>Vu</td>
                            <td><?= $data->view; ?></td>
                        </tr>
                        <tr>
                            <td>Date de publication</td>
                            <td><?= $data->date; ?></td>
                        </tr>
                    </table>
                    <table class="belcms_downloads_table">
                        <tr>
                            <td>Date</td>
                            <td><?= Common::TransformDate($data->date, 'LONG', 'SHORT'); ?></td>
                        </tr>
                        <tr>
                            <td>Commentaires</td>
                            <td>5</td>
                        </tr>
                         <tr>
                            <td>Fichier télécharger</td>
                            <td><?= $data->dls; ?></td>
                        </tr>
                         <tr>
                            <td>Catégorie</td>
                            <td></td>
                        </tr>              
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-info" onclick="location.href='Downloads/getDownload/<?= $data->id; ?>&echo'">Télécharger</button>
            </div>
        </div>
    </div>
</section>