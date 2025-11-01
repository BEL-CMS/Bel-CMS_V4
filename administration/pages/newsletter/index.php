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
                        Liste des commentaires du livre d'or
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-1000" id="DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Auteur</th>
                                    <th>IP</th>
                                    <th>E-mail</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value):
                                    $user = User::ifUserExist($value->hash_key);
                                    if ($user == true) {
                                        $infosUser = User::getInfosUserAll($value->hash_key);
                                        $username = $infosUser->user->username;
                                    } else {
                                        $username = $value->hash_key;
                                    }
                                ?>
                                    <tr>
                                        <td><?= $username; ?></td>
                                        <td><?= $value->ip; ?></td>
                                        <td><?= $value->mail; ?></td>
                                        <td><?= Common::TransformDate($value->date, 'FULL', 'MEDIUM'); ?></td>
                                        <td align="center">
                                            <a href="newsletter/delete/<?= $value->id; ?>?admin&option=pages" class="btn btn-danger label-end rounded-pill">
                                                Supprimer
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