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
                <div class="card-header">
                    <div class="card-title">
                        Liste des événements
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS" id="DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Date du début</th>
                                    <th>Date de fin</th>
                                    <th>Heure</th>
                                    <th style="text-align:center !important;">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($events as $value):
                            ?>
                                <tr>
                                    <td><?= $value->name; ?></td>
                                    <td><?= Common::TransformDate($value->start_date, 'MEDIUM', 'NONE'); ?></td>
                                    <td><?= Common::TransformDate($value->end_date, 'MEDIUM', 'NONE'); ?></td>
                                    <td><?= $value->start_time;?> - <?= $value->end_time; ?></td>
                                    <td style="text-align:center !important;"></td>
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