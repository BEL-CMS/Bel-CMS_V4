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
                        Liste de(s) image(s) a validé
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th width="120" height="90">Images</th>
                                    <th>Nom</th>
                                    <th>Catégorie(s)</th>
                                    <th>Description</th>
                                    <th style="text-align:center !important;">Date de l'ajout</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($gallery as $v):
                                ?>
                                    <tr>
                                        <td style="text-align:center !important;" class="sorting_1">
                                            <source style="width: 50px;" src="<?= $v->url; ?>" type="image/webp">
                                            <img style="width: 50px;" src="<?= $v->url; ?>" class="glightbox">
                                        </td>
                                        <td><?= $v->name; ?></td>
                                        <td><?php if ($v->id_cat == false) {
                                            echo 'Merci de faire votre choix parmi les catégories';
                                            }
                                            ?></td>
                                        <td><?= Common::truncate_3($v->description, 100); ?></td>
                                        <td><?= Common::TransformDate($v->date_post, 'FULL', 'MEDIUM'); ?></td>
                                        <td>
                                            <a href="gallery/deleteimg/<?= $v->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                                Supprimer
                                                <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                            </a>
                                            &emsp;
                                            <a href="gallery/editimg/<?= $v->id; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
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