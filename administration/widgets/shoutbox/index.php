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
                <div class="card-header">
                    <div class="card-title">
                        Liste des messages
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Nom / Pseudonyme</th>
                                    <th>e-mail</th>
                                    <th style="text-align:center !important;">Messages</th>
                                    <th style="text-align:center !important;">Date de publication</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value):
                                    if (User::ifUserExist($value->hash_key)):
                                        $user = User::getInfosUserAll($value->hash_key);
                                    endif;
                                ?>
                                <tr>
                                    <td><?= $user->user->username; ?></td>
                                    <td><?= $user->user->mail; ?></td>
                                    <td><?= Common::truncate_3($value->msg, 100); ?></td>
                                    <td><?= Common::TransformDate($value->date_msg, 'MEDIUM', 'MEDIUM'); ?></td>
                                    <td>
                                        <button class="btn btn-info label-btn rounded-pill" onclick="location.href='shoutbox/edit/<?=$value->hash_key;?>?admin&option=widgets'">
                                            <i class="ri-settings-4-line label-btn-icon me-2"></i>Edition
                                        </button>&nbsp; &nbsp;
                                        <button class="btn btn-danger label-btn label-end rounded-pill" onclick="location.href='shoutbox/del/<?=$value->hash_key;?>?admin&option=widgets'">Supprimer
                                            <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
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