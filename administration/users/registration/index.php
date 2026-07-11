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

use BelCMS\Core\Groups;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

$letter = strtolower($_GET['letter'] ?? 'a');
?>

<nav class="mb-3 mt-3">
    <ul class="pagination">
        <?php foreach (range('a', 'z') as $l): ?>
            <li class="page-item <?= $letter === $l ? 'active' : ''; ?>">
                <a class="page-link" href="registration?admin&option=users&letter=<?= $l; ?>">
                    <?= strtoupper($l); ?>
                </a>
            </li>
        <?php endforeach; ?>
        <li class="page-item <?= $letter === '0' ? 'active' : ''; ?>">
            <a class="page-link" href="registration?admin&option=users&letter=0">
                #
            </a>
        </li>
    </ul>
</nav>

<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Liste des membres
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Nom / Pseudonyme</th>
                                    <th>e-mail</th>
                                    <th style="text-align:center !important;">IP</th>
                                    <th style="text-align:center !important;">Validation</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $key => $value):
                               $valid = ($value->valid == 1 ) ? 'Validé' : 'Non validé';
                            ?>
                                <tr>
                                    <td><?=$value->username;?></td>
                                    <td><?=$value->mail;?></td>
                                    <td style="text-align:center !important;"><?=$value->ip;?></td>
                                    <td style="text-align:center !important;"><?= $valid; ?></td>
                                    <?php
                                    if ($value->root == 0):
                                    ?>
                                    <td>
                                        <button class="btn btn-info label-btn rounded-pill" onclick="location.href='registration/edit/<?=$value->hash_key;?>?admin&option=users'">
                                            <i class="ri-settings-4-line label-btn-icon me-2"></i>Edition
                                        </button>&nbsp; &nbsp; 
                                        <button class="btn btn-danger label-btn label-end rounded-pill" onclick="location.href='registration/del/<?=$value->hash_key;?>?admin&option=users'">Supprimer
                                            <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                    </td>
                                    <?php
                                    else:
                                    ?>
                                    <td></td>
                                    <?php
                                    endif;
                                    ?>
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