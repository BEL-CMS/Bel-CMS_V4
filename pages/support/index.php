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

use BelCMS\Core\Notification;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="card mb-4">
    <div class="card-header" id="belcms_header_title">
        <h2><i class="fa-solid fa-angles-right"></i> Support</h2>
        <a href="support/create" title="créé un support">Créer un ticket</a>
        <a href="support" title="home support">Accueil</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section">Posez vos questions ici et j'y répondrai dans les plus brefs délais.</h3>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr style="font-weight:bold;">
                    <th>ID</th>
                    <td>Titre</td>
                    <th>Sujet</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                    <th colspan="2">Date de création</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (empty($msg)):
                ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Aucun support actuellement.</td>
                </tr>
                <?php
                else:
                foreach ($msg as $key => $value):
                    if($value->status == 1) {
                        $status = '<td><span class="badge bg-warning text-dark">En attente</span></td>';
                    } else if ($value->status == 2) {
                        $status = '<td><span class="badge bg-info text-dark">En cours</span></td>';
                    } else if ($value->status == 3) {
                        $status = '<td><span class="badge bg-success">Répondu</span></td>';
                    } else {
                        $status = '<td><span class="badge bg-warning">En attente</span></td>';
                    }
                    if ($value->priority == 1) {
                        $priority = '<td><span class="badge bg-danger">Haute</span></td>';
                    } elseif ($value->priority == 2) {
                        $priority = '<td><span class="badge bg-warning text-dark">Normal</span></td>';
                    } else {
                        $priority = '<td><span class="badge bg-info text-dark">faible</span></td>';
                    }
                ?>
                <tr>
                    <td>#<?= $value->number_id; ?></td>
                    <td><?= $value->title; ?></td>
                    <td><?= $value->subject; ?></td>
                    <?= $status; ?>
                    <?= $priority; ?>
                    <td><?= Common::TransformDate($value->created_at, 'MEDIUM'); ?></td>
                    <td><button type="button" onclick="location.href='support/view/<?= $value->number_id; ?>';" class="belcms_support_button">Ouvrir</button></td>
                </tr>
                <?php
                endforeach;
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>
