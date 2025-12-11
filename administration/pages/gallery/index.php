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
                        Liste des images
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100" id="DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Nom</th>
                                    <th>Image</th>
                                    <th>Câtégorie</th>
                                    <th>Sous-catégorie</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($screen as $img):
                            ?>
                            <tr>
                                <td><?= $img->id; ?></td>
                                <td><?= $img->name; ?></td>
                                <td>
                                    <a href="<?= $img->url; ?>" class="glightbox">
                                        <img style="height: 60px;" src="<?= $img->url; ?>" alt="work-thumbnail" class="rounded-lg">
                                    </a>
                                </td>
                                <td><?= $img->nameCat; ?></td>
                                <td><?= $img->nameSecCat; ?></td>
                                <td>
                                    <a href="gallery/deleteimg/<?= $img->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                        <?= constant('DELETE'); ?>
                                        <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                    </a>
                                    <a href="gallery/editimg/<?= $img->id; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
                                        <i class="ri-chat-smile-line label-btn-icon me-2"></i>
                                        <?= constant('EDIT') ?>
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