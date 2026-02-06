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
                        Liste des tickets
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>hash</th>
                                    <th>Auteur</th>
                                    <th style="text-align:center !important;">Sujet</th>
                                    <th style="text-align:center !important;">Statut</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $v):
                                    if ($v->status == 0) {
                                        $style = '<div class="flex-fill p-3 bd-red-800">Non consulté</div>';
                                    } else if ($v->status == 1) {
                                        $style = '<div class="flex-fill p-3 bd-indigo-700">Actuellement en consultation</div>';
                                    } else {
                                        $style = '<div class="flex-fill p-3 bd-gray-300">Fermer</div>';
                                    }
                                ?>
                                    <tr>
                                        <td><?= $v->hash; ?></td>
                                        <td><?= $v->author; ?></td>
                                        <td><?= $v->subject->name; ?></td>
                                        <td><?= $style; ?></td>
                                        <td>
                                            <a href="tickets/del/<?= $v->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                                Supprimer
                                                <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                            </a>
                                            &emsp;
                                            <a href="tickets/read/<?= $v->hash; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
                                                <i class="ri-chat-smile-line label-btn-icon me-2"></i>
                                                Voir
                                            </a>
                                            &emsp;
                                            <a href="tickets/close/<?= $v->hash; ?>?admin&option=pages" class="btn btn-info label-btn label-end rounded-pill">
                                                <i class="fa-solid fa-circle-xmark label-btn-icon ms-2">X</i>
                                                Fermer
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