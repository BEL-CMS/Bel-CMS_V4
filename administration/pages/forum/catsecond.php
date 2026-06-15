<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
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
                        Liste des catégorie secondaire
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Icônes</th>
                                    <th>Forum</th>
                                    <th>Sous-forum</th>
                                    <th>Sous-titre</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $v):
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><i style="font-size: 26px;" class="<?= $v->icon; ?>"></i></td>
                                        <td><?= $v->nameForum->title; ?></td>
                                        <td><?= $v->title; ?></td>
                                        <td><?= $v->subtitle; ?></td>
                                        <td>
                                            <button class="btn btn-info label-btn rounded-pill" onclick="location.href='forum/seconCatEdit/<?= $v->id; ?>?admin&option=pages'">
                                                <i class="ri-settings-4-line label-btn-icon me-2"></i>Edition
                                            </button>&nbsp; &nbsp;
                                            <button class="btn btn-danger label-btn label-end rounded-pill" onclick="location.href='forum/seconCatDel/<?= $v->id; ?>?admin&option=pages'">Supprimer
                                                <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                            </button>
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