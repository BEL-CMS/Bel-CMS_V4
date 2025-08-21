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
if (User::ifUserExist($links->author)) {
    $user = User::getInfosUserAll($links->author);
    $user = $user->user->username;
} else {
    $user = 'inconnu';
}
if (!empty($this->img)) {
    $img = $this->img;
} else {
    $img = null;
}
?>
<section id="belcms_links">
    <div class="container">
        <div class="row">
            <div id="belcms_cat_view">
                <div class="belcms_cat_view_box">
                    <div id="belcms_cat_view_title">
                        <h2><?=$links->name;?></h2>
                    </div>
                    <div id="belcms_cat_view_img">
                        <img src="<?=$img;?>" class="img-thumbnail" alt="...">
                    </div>
                    <div id="belcms_cat_view_infos" class="card">
                        <div class="card-header">Information
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <thead>
                                    <tr><td colspan="2" id="belcms_cat_view_inf">Informations</td></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Vu</td>
                                        <td><?= $links->view; ?></td>
                                    <tr>
                                    </tr>
                                        <td>Date de publication</td>
                                        <td><?= Common::TransformDate($links->date_insert, 'FULL', 'MEDIUM'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Visité</td>
                                        <td><?= $links->click; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Auteur</td>
                                        <td><?= $user; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div id="textarea"><?= $links->description; ?></div>
                        </div>
                        <div class="card-footer">
                            <a href="Links/Click/<?=$links->id;?>" target="_blank" title="<?=$links->name;?>">Lien</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
