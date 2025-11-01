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
                        Liste de(s) lien(s)
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100" id="DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Lien</th>
                                    <th>Auteur</th>
                                    <th>Date de l'ajout</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($links as $key => $value):
                                    if (User::ifUserExist($value->author)) {
                                        $user = User::getInfosUserAll($value->author);
                                        $user = $user;
                                        $author = $user->user->username;
                                    } elseif (!empty($value->author)) {
                                        $author = $value->author;
                                    } else {
                                        $author = 'Utilisateur inconnu';
                                    }
                                ?>
                                    <tr>
                                        <td><?= $value->name; ?></td>
                                        <td><a target="_blank" href="<?= $value->link; ?>"><?= $value->link; ?></a></td>
                                        <td><?= $author; ?></td>
                                        <td><?= Common::TransformDate($value->date_insert, 'FULL', 'MEDIUM'); ?></td>
                                        <td align="center">
                                            <a href="links/delete/<?= $value->id; ?>?admin&option=pages" class="btn btn-danger label-end rounded-pill">
                                                Supprimer
                                            </a>&emsp;
                                            <a href="links/editdls/<?= $value->id; ?>?admin&option=pages" class="btn btn-warning rounded-pill">
                                                Editer
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>