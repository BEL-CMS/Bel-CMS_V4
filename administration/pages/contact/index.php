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
                        Liste des catégories pour la page contact
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS" id="DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Mails</th>
                                    <th>IP</th>
                                    <th>Date</th>
                                    <th>Catégorie</th>
                                    <th>Objet</th>
                                    <th style="text-align:center !important;">Lu</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($mails as $value):
                                    $readMail = ($value->read_mail) == 1 ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(25, 172, 31)" d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM320 224C373 224 416 267 416 320C416 373 373 416 320 416C267 416 224 373 224 320C224 267 267 224 320 224z"/></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="rgb(218, 15, 15)" d="M252.6 64.1C235.6 64.1 219.3 70.8 207.3 82.8L83.2 207C71.2 219 64.5 235.2 64.5 252.2L64.5 387.8C64.5 404.8 71.2 421.1 83.2 433.1L207.4 557.2C219.4 569.2 235.7 575.9 252.7 575.9L388.3 575.9C405.3 575.9 421.6 569.2 433.6 557.2L557.6 433C569.6 421 576.3 404.7 576.3 387.7L576.3 252.1C576.3 235.1 569.6 218.8 557.6 206.8L433.5 82.8C421.5 70.8 405.2 64.1 388.2 64.1L252.6 64.1z"/></svg>';
                                ?>
                                <tr>
                                    <td><?= $value->mail_user; ?></td>
                                    <td style="text-align:center !important;"><?= $value->ip_user; ?></td>
                                    <td style="text-align:center !important;"><?= $value->date_mail; ?></td>
                                    <td style="text-align:center !important;"><?= $value->category; ?></td>
                                    <td style="text-align:center !important;"><?= $value->object; ?></td>
                                    <td style="width:20px;height:20px;"><?= $readMail; ?></td>
                                    <td>
                                        <a href="contact/delete/<?= $value->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                            Supprimer
                                            <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                        </a>
                                        <a href="contact/read/<?= $value->id; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
                                            <i class="ri-chat-smile-line label-btn-icon me-2"></i>
                                            Lire
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