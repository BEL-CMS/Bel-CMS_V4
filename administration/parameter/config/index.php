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
                        Liste des pages
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th style="text-align:center !important;">Nom</th>
                                    <th>Description</th>
                                    <th style="text-align:center !important;">Version</th>
                                    <th style="text-align:center !important;">Date de création</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value):
                                    $value->name = defined((strtoupper($value->name))) ? constant(strtoupper($value->name)) : $value->name;
                                    if ($value->active == 1) {
                                        $actif = '<a href="registration/off/' . $value->id . '?admin&option=users" class="btn btn-danger label-btn label-end rounded-pill">
                                        Désactiver
                                        <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i></a>&nbsp; &nbsp;';
                                    } else {
                                        $actif = '<a href="registration/on/' . $value->id . '?admin&option=users" class="btn btn-success label-btn label-end rounded-pill">
                                        Activer
                                        <i class="ri-thumb-up-line label-btn-icon ms-2"></i></a>&nbsp; &nbsp;';
                                    }
                                ?>
                                    <tr>
                                        <td style="text-align:center !important;"><?= $value->name; ?></td>
                                        <td><?= $value->description; ?></td>
                                        <td style="text-align:center !important;"><?= $value->ver; ?></td>
                                        <td style="text-align:center !important;"><?= $value->date_page; ?></td>
                                        <td style="text-align:center !important;">
                                            <button class="btn btn-info" onclick='location.href="config/edit/<?= $value->id; ?>?admin&option=parameter"'><i class="fa-solid fa-pen"></i> Editer</button>
                                        </td>
                                    </tr>
                                <?php
                                endforeach
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>