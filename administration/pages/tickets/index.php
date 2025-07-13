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
<div id="belcms_links_menu">
    <a class="active" href="Tickets" title="Lien"><i class="fa-solid fa-house"></i></a> | <a href="Tickets/send" title="Nouveau tickets"><i class="fa-solid fa-square-plus"></i></a>
</div>
<div class="table-responsive mt-2">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>N°</th>
                <th>Ticket Details</th>
                <th>Ticket Date</th>
                <th>Status Actions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tickets as $value):
                if ($value->status == 0) {
                    $status = 'Non consulté';
                } else if ($value->status == 1) {
                    $status = 'Actuellement en consultation';
                } else {
                    $status = 'Fermer';
                }
            ?>
                <tr>
                    <td><?= $value->hash; ?></td>
                    <td><?= $value->subject->name; ?></td>
                    <td><?= Common::TransformDate($value->date_post, 'FULL', 'MEDIUM'); ?></td>
                    <td><?= $status; ?></td>
                    <td><a class="btn btn-info btn-sm" href="Tickets/read/<?= $value->hash; ?>">Lire</a></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>