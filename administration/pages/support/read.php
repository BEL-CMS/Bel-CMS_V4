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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

$infosUser = User::getInfosUserAll($infos->user_hash_key);

if($infos->status == 1) {
    $status = '<td><span class="badge bg-warning text-dark">En attente</span></td>';
} else if ($infos->status == 2) {
    $status = '<td><span class="badge bg-info text-dark">En cours</span></td>';
} else if ($infos->status == 3) {
    $status = '<td><span class="badge bg-success">Répondu</span></td>';
} else if ($infos->status == 4) {
    $status = '<td><span class="badge bg-success">Fermer</span></td>';
} else {
    $status = '<td><span class="badge bg-warning">En attente</span></td>';
}
if ($infos->priority == 1) {
    $priority = '<td><span class="badge bg-danger">Haute</span></td>';
} elseif ($infos->priority == 2) {
    $priority = '<td><span class="badge bg-warning text-dark">Normal</span></td>';
} else {
    $priority = '<td><span class="badge bg-info text-dark">faible</span></td>';
}
?>
<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3">
                            <table class="table table-dark table-hover">
                                <tr>
                                    <td>Auteur :</td>
                                    <td><?= $infosUser->user->username; ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail :</td>
                                    <td><?= $infosUser->user->mail; ?></td>
                                </tr>
                                <tr>
                                    <td>IP :</td>
                                    <td><?= $infos->ip_user;?></td>
                                </tr>
                                <tr>
                                    <td>Titre :</td>
                                    <td><?= $infos->title;?></td>
                                </tr>
                                <tr>
                                    <td>Sujet :</td>
                                    <td><?= $infos->subject; ?></td>
                                </tr>
                                <tr>
                                    <td>Date de créaation :</td>
                                    <td><?= Common::TransformDate($infos->created_at,'FULL', 'MEDIUM'); ?></td>
                                </tr>
                                <tr>
                                    <td>Prioriter :</td>
                                    <?= $priority; ?>
                                </tr>
                                <tr>
                                    <td>Statut :</td>
                                    <?= $status; ?>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xl-9">
                        <?php
                        foreach ($messages as $key => $value):
                            $bgColor = $value->user_id == $infos->user_hash_key ? 'text-dark bg-info' : 'text-white bg-success';
                        ?>
                        <div class="card <?= $bgColor; ?> mb-3">
                            <div class="card-header"><?= Common::TransformDate($value->created_at, 'FULL', 'MEDIUM'); ?> par : <?= User::getNameForHash($value->user_id); ?></div>
                            <div class="card-body"><?= Common::VarSecure($value->message, true); ?></div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form method="post" action="support/reply?Admin&option=pages">
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="message"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $infos->number_id; ?>">
                            <button type="button" class="btn btn-success" onclick="location.href='support/readmsg/<?= $infos->number_id; ?>?Admin&option=pages';">Lu</button>
                            <button type="submit" class="btn btn-primary">Répondre</button>
                            <button type="button" class="btn btn-info" onclick="location.href='support/close/<?= $infos->number_id; ?>?Admin&option=pages';">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>