<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
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
                        Liste des inscriptions à la formation « Osez sauver »
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>heures</th>
                                    <th>Lieu</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <body>
                            <?php
                            foreach ($data as $key => $value):
                                $date_debut = $value->heure_debut;
                                $date_debut = DateTime::createFromFormat('H:i:s', $date_debut);
                                $date_fin = $value->heure_fin;
                                $date_fin = DateTime::createFromFormat('H:i:s', $date_fin);
                            ?>
                            <tr>
                                <td><?= $value->id; ?></td>
                                <td><?= Common::TransformDate($value->date_activite, 'FULL'); ?></td>
                                <td><?= $date_debut->format('H\hi'); ?> - <?= $date_fin->format('H\hi'); ?></td>
                                <td><?= $value->lieu; ?></td>
                                <td></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>