<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
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
                        Liste des messages du forum
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>CODE ID</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($threads as $v):
                                    if (User::ifUserExist($v->author)) {
                                        $username = User::getInfosUserAll($v->author);
                                        $username = $username->user->username;
                                    } else {
                                        $username = $v->author;
                                    }
                                    $dateMsg = Common::TransformDate($v->date_post, 'FULL', 'MEDIUM');
                                ?>
                                    <td><?= $v->id_message; ?></td>
                                    <td><?= $v->title; ?></td>
                                    <td><?= $username; ?></td>
                                    <td><?= $dateMsg; ?></td>
                                    <td>
                                        <button class="btn btn-info label-btn rounded-pill" onclick="location.href='registration/edit/<?= $v->id; ?>?admin&option=users'">
                                            <i class="ri-settings-4-line label-btn-icon me-2"></i>Edition
                                        </button>&nbsp; &nbsp;
                                        <button class="btn btn-danger label-btn label-end rounded-pill" onclick="location.href='registration/del/<?= $v->id; ?>?admin&option=users'">Supprimer
                                            <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                        </button>
                                    </td>
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