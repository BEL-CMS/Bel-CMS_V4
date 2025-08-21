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
                        Liste des téléchargements
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th width="width:125px">Images</th>
                                    <th>Icônes</th>
                                    <th width="25px">ID Groupes</th>
                                    <th>Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $value):
                                    if (empty($value->banniere)) {
                                        $file = 'assets/img/no-image-png.png';
                                    } else {
                                        $file = $value->banniere;
                                    }
                                    if ($value->banniere == '/uploads/downloads/cat/UPLOAD_NONE') {
                                        $file = 'assets/img/error-file.png';
                                    }
                                ?>
                                <tr>
                                    <td style="text-align:center !important;" class="sorting_1">
                                        <source style="width: 125px;" src="<?=$file;?>" type="image/webp">
                                        <img style="width: 125px;" src="<?=$file;?>" class="glightbox">
                                    </td>
                                    <td style="text-align:center !important;"><i style="text-align:center;font-size: 90px;" class="<?= $value->ico; ?>"></i></td>
                                    <td style="text-align:center !important;"><?=$value->id_groups;?></td>
                                    <td><?=$value->name;?></td>
                                    <td>
                                        <a href="downloads/deletecat/<?= $value->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                            Supprimer
                                            <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                        </a>
                                        <a href="downloads/editcat/<?= $value->id; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
                                            <i class="ri-chat-smile-line label-btn-icon me-2"></i>
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