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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<?php

use BelCMS\Core\Groups;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
 */

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header">
                    <div class="card-title">
                        Liste des page(s) de l'article
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th style="text-align:center !important;">ID</th>
                                    <th>Nom</th>
                                    <th>Date de publication</th>
                                    <th style="text-align:center !important;">Vu</th>
                                    <th>Auteur</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($view as $v):
                                    if (User::ifUserExist($v->author)):
                                        $user = User::getInfosUserAll($v->author);
                                        $user = $user;
                                        $author = $user->user->username;
                                        $color  = $user->user->color;
                                    else:
                                        $author = 'Utilisateur inconnu';
                                        $color  = 'color-mix';
                                    endif;
                                ?>

                                    <tr>
                                        <td style="color: #FFFFFF;"><?= $v->id_articles; ?></td>
                                        <td><?= $v->name; ?></td>
                                        <td><?= Common::TransformDate($v->publish, 'FULL', 'MEDIUM'); ?></td>
                                        <td style="text-align:center !important;"><?= $v->view; ?></td>
                                        <td style="color: <?= $color; ?>;"><?= $author; ?></td>
                                        <td>
                                            <a href="Articles/deletePage/<?= $v->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                                Supprimer
                                                <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                            </a>
                                            <a href="Articles/editdls/<?= $v->id; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
                                                <i class="ri-chat-smile-line label-btn-icon me-2"></i>
                                                Editer
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>