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
                        Liste des supports
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-1000 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th><?= constant('ID'); ?></th>
                                    <th><?= constant('SUBJECT'); ?></th>
                                    <th><?= constant('USERS'); ?></th>
                                    <th><?= constant('DATE'); ?></th>
                                    <th><?= constant('IP'); ?></th>
                                    <th>Statut</th>
                                    <th>Prioriter</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($messages as $key => $value):
                                    if($value->status == 1) {
                                        $status = '<td style="text-align:center;"><span class="badge bg-warning text-dark">En attente</span></td>';
                                    } else if ($value->status == 2) {
                                        $status = '<td style="text-align:center;"><span class="badge bg-info text-dark">En cours</span></td>';
                                    } else if ($value->status == 3) {
                                        $status = '<td style="text-align:center;"><span class="badge bg-success">Répondu</span></td>';
                                    } else if ($value->status == 4) {
                                        $status = '<td style="text-align:center;"><span class="badge bg-success">Fermer</span></td>';
                                    } else {
                                        $status = '<td style="text-align:center;"><span class="badge bg-warning">En attente</span></td>';
                                    }
                                    if ($value->priority == 1) {
                                        $priority = '<td style="text-align:center;"><span class="badge bg-danger">Haute</span></td>';
                                    } elseif ($value->priority == 2) {
                                        $priority = '<td style="text-align:center;"><span class="badge bg-warning text-dark">Normal</span></td>';
                                    } else {
                                        $priority = '<td style="text-align:center;"><span class="badge bg-info text-dark">faible</span></td>';
                                    }
                                ?>
                                <tr>
                                    <td><?= $value->number_id; ?></td>
                                    <td><?= $value->title; ?></td>
                                    <td><?= $value->user_hash_key; ?></td>
                                    <td><?=  Common::TransformDate($value->created_at, 'MEDIUM', 'MEDIUM'); ?></td>
                                    <td><?= $value->ip_user; ?></td>
                                    <?= $status; ?>
                                    <?= $priority; ?>
                                    <td align="center">
                                        <a href="support/read/<?= $value->number_id; ?>?Admin&option=pages" class="btn btn-success label-end rounded-pill">Lire</a>&nbsp;
                                        <a href="support/del/<?= $value->number_id; ?>?Admin&option=pages" class="btn btn-danger label-end rounded-pill">Supprimer</a>
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