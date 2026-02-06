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
                                    <th scope="col">Utilisateur banni(e)</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Début du bannissement</th>
                                    <th scope="col">Fin du bannissement</th>
                                    <th scope="col">Durée du bannissement</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $a):
                                    if (User::ifUserExist($a->author)) {
                                        $a->author = User::getInfosUserAll($a->author);
                                        $a->author = $a->author->user->username;
                                    }
                                    $a->timeban = defined(strtoupper($a->timeban)) ? constant(strtoupper($a->timeban)) : $a->timeban;   
                                ?>
                                <tr>
                                    <td><?=$a->author;?></td>
                                    <td><?=$a->ip?></td>
                                    <td><?=$a->email;?></td>
                                    <td><?=Common::TransformDate($a->date, 'FULL', 'MEDIUM');?></td>
                                    <td><?=Common::TransformDate($a->endban, 'FULL', 'MEDIUM');?></td>
                                    <td><?=$a->timeban;?></td>
                                    <td></td>
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
