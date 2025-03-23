<?php

use BelCMS\Core\Groups;
use BelCMS\Requires\Common;

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
 */

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
                        Liste des membres
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th style="text-align:center !important;">Avatar</th>
                                    <th>Nom / Pseudonyme</th>
                                    <th>e-mail</th>
                                    <th style="text-align:center !important;">IP</th>
                                    <th style="text-align:center !important;">Date d'enregistrement</th>
                                    <th style="text-align:center !important;">Dernière visite</th>
                                    <th style="text-align:center !important;">groupe principal</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $key => $value):
                                $userGroup = Groups::getName($value->profils->groups->user_group);
                                $nameGroup = defined((strtoupper($userGroup->name))) ? constant(strtoupper($userGroup->name)) : $userGroup->name;
                            ?>
                                <tr>
                                    <td style="text-align:center !important;">
                                        <source style="width: 50px;" srcset="<?=$value->profils->profils->avatar;?>" type="image/webp">
                                        <img style="width: 50px;" src="<?=$value->profils->profils->avatar;?>" class="glightbox">
                                    </td>
                                    <td><?=$value->username;?></td>
                                    <td><?=$value->mail;?></td>
                                    <td style="text-align:center !important;"><?=$value->ip;?></td>
                                    <td style="text-align:center !important;"><?=Common::TransformDate($value->profils->profils->date_registration, 'FULL', 'MEDIUM');?></td>
                                    <td style="text-align:center !important;"><?=Common::TransformDate($value->profils->page->last_visit, 'FULL', 'MEDIUM');?></td>
                                    <td style="text-align:center !important;"><?=$nameGroup;?></td>
                                    <td>
                                        <button class="btn btn-info label-btn rounded-pill" onclick="location.href='registration/edit/<?=$value->hash_key;?>?admin&option=users'">
                                            <i class="ri-settings-4-line label-btn-icon me-2"></i>Edition
                                        </button>&nbsp; &nbsp; 
                                        <button class="btn btn-danger label-btn label-end rounded-pill" onclick="location.href='registration/del/<?=$value->hash_key;?>?admin&option=users'">Supprimer
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