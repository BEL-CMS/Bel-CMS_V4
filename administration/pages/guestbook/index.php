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
                        <table class="table table-bordered text-nowrap w-100" id="DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value):
                                    $user = User::ifUserExist($value->author);
                                    if ($user == true) {
                                        $infosUser = User::getInfosUserAll($value->author);
                                        $username = $infosUser->user->username;
                                    } else {
                                        $username = constant('NO_NAME');
                                    }
                                ?>
                                    <tr>
                                        <td><?= $value->id; ?></td>
                                        <td><?= $username; ?></td>
                                        <td><?= Common::TransformDate($value->date_insert, 'FULL', 'MEDIUM'); ?></td>
                                        <td><?= Common::truncate(Common::VarSecure($value->message,null), 80); ?></td>
                                        <td align="center">
                                            <a href="guestbook/delete/<?= $value->id; ?>?admin&option=pages" class="btn btn-danger label-end rounded-pill">
                                                Supprimer
                                            </a>&emsp;
                                            <a href="guestbook/edit/<?= $value->id; ?>?admin&option=pages" class="btn btn-warning rounded-pill">
                                                Editer
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