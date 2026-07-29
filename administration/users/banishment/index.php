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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

    function timelaps ($time)
    {
        switch ($time) {
            case '9':
                $timeFinish = 'PT1M';
            break;

            case '8':
                $timeFinish = 'PT5M';
            break;

            case '7':
                $timeFinish = 'PT15M';
            break;

            case '6':
                $timeFinish = 'PT1H';
            break;

            case '5':
                $timeFinish = 'P1D';
            break;

            case '4':
                $timeFinish = 'P7D';
            break;

            case '3':
                $timeFinish = 'P1M';
            break;

            case '2':
                $timeFinish = 'P6M';
            break;

            case '1':
                $timeFinish = 'P1Y';
            break;

            case '0':
                $timeFinish = 'Définitif';
            break;
        }
        return $timeFinish;
    }

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
                        Liste des bannissements
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Utilisateur banni(e)</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Création du bannissement</th>
                                    <th scope="col">Début du bannissement</th>
                                    <th scope="col">Fin du bannissement</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data as $key => $value):
                                $active = $value->active == 1 ? 'style="background: #8b0000;"' : 'style="background: #8fbc8f;"';
                                $nameTime = $value->active == 1 ? 'toujours actif' : "Déban";
                            ?>
                                <tr>
                                    <td><?= $value->ban_id; ?></td>
                                    <td><?= $value->author; ?></td>
                                    <td><?= $value->ip; ?></td>
                                    <td><?= Common::TransformDate($value->created_at, 'MEDIUM', 'MEDIUM'); ?></td>
                                    <td><?= Common::TransformDate($value->last_attempt, 'MEDIUM', 'MEDIUM'); ?></td>
                                    <td><?= Common::remainingTime($value->expires_at); ?></td>
                                    <td <?= $active; ?>><?= $nameTime; ?></td>
                                    <td><a href="banishment/delete/<?= $value->ban_id; ?>?admin&option=users" class="btn btn-danger btn-sm">Supprimer</a></td>
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
