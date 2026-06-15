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
                        Liste des téléchargements
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS" id="DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Name</th>
                                    <th>Tailles</th>
                                    <th>Date</th>
                                    <th style="text-align:center !important;">Vu</th>
                                    <th style="text-align:center !important;">Nb Downloads</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($downloads as $value):
                                   if (file_exists($value->screen)) {
                                        $file = '/'.$value->screen;
                                   } else {
                                        $file = 'assets/img/no-image-png.png';
                                   }
                                   $view = empty($value->view) ? 0 : $value->view;
                                   $dls  = empty($value->dls) ? 0 : $value->dls;
                                ?>
                                <tr>
                                    <td style="text-align:center !important;" class="sorting_1">
                                        <source style="width: 50px;" src="<?=$file;?>" type="image/webp">
                                        <img style="width: 50px;" src="<?=$file;?>" class="glightbox">
                                    </td>
                                    <td><?=$value->name;?></td>
                                    <td><?=Common::ConvertSize($value->size);?></td>
                                    <td><?=Common::TransformDate($value->date, 'FULL', 'MEDIUM');?></td>
                                    <td style="text-align:center !important;"><?= $view; ?></td>
                                    <td style="text-align:center !important;"><?= $dls; ?></td>
                                    <td>
                                        <a href="downloads/delete/<?= $value->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                            Supprimer
                                            <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                        </a>
                                        <a href="downloads/editdls/<?= $value->id; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
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