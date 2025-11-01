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
                        Liste de(s) catégorie(s)
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100" id="DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Couleur</th>
                                    <th>Description</th>
                                    <th>Date de l'ajout</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cat as $v):
                                ?>
                                    <tr>
                                        <td>
                                            <source style="width: 120;max-height:80px;" src="<?= $v->background; ?>" type="image/webp" class="glightbox">
                                            <img style="width: 120;max-height:80px;" src="<?= $v->background; ?>" class="glightbox">
                                        </td>
                                        <td><?= $v->name; ?></td>
                                        <td style="background-color: <?= $v->color; ?>"><?= $v->color; ?></td>
                                        <td><?= Common::truncate_3($v->description, 80); ?></td>
                                        <td><?= Common::TransformDate($v->datecreate, 'FULL', 'MEDIUM'); ?></td>
                                        <td>
                                            <a href="gallery/deletecat/<?= $v->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                                Supprimer
                                                <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                            </a>
                                            <a href="gallery/editcat/<?= $v->id; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
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