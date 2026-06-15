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
                                    <th style="text-align:center !important;">IP</th>
                                    <th style="text-align:center !important;">Date</th>
                                    <th style="text-align:center !important;">Catégorie</th>
                                    <th style="text-align:center !important;">Objet</th>
                                    <th style="text-align:center !important;">Lu</th>
                                    <th style="text-align:center !important;">Réponse</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($mails as $value):
                                    $readMail = ($value->read_mail) == 1 ? '<svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640"><path fill="rgb(25, 172, 31)" d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM320 224C373 224 416 267 416 320C416 373 373 416 320 416C267 416 224 373 224 320C224 267 267 224 320 224z"/></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640"><path fill="rgb(218, 15, 15)" d="M252.6 64.1C235.6 64.1 219.3 70.8 207.3 82.8L83.2 207C71.2 219 64.5 235.2 64.5 252.2L64.5 387.8C64.5 404.8 71.2 421.1 83.2 433.1L207.4 557.2C219.4 569.2 235.7 575.9 252.7 575.9L388.3 575.9C405.3 575.9 421.6 569.2 433.6 557.2L557.6 433C569.6 421 576.3 404.7 576.3 387.7L576.3 252.1C576.3 235.1 569.6 218.8 557.6 206.8L433.5 82.8C421.5 70.8 405.2 64.1 388.2 64.1L252.6 64.1z"/></svg>';
                                    $check = ($value->send_reply) == 1 ? '<svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640"><path fill="rgb(99, 230, 190)" d="M64 176C64 149.5 85.5 128 112 128L528 128C554.5 128 576 149.5 576 176L576 257.4C551.6 246.2 524.6 240 496 240C408.3 240 334.3 298.8 311.3 379.2C304.2 377.9 297.2 375 291.2 370.4L83.2 214.4C71.1 205.3 64 191.1 64 176zM304 432C304 460.6 310.2 487.6 321.4 512L128 512C92.7 512 64 483.3 64 448L64 260L262.4 408.8C275 418.2 289.3 424.2 304.1 426.7C304.1 428.5 304 430.2 304 432zM352 432C352 352.5 416.5 288 496 288C575.5 288 640 352.5 640 432C640 511.5 575.5 576 496 576C416.5 576 352 511.5 352 432zM553.4 371.1C546.3 365.9 536.2 367.5 531 374.6L478 447.5L451.2 420.7C445 414.5 434.8 414.5 428.6 420.7C422.4 426.9 422.4 437.1 428.6 443.3L468.6 483.3C471.9 486.6 476.5 488.3 481.2 487.9C485.9 487.5 490.1 485.1 492.9 481.4L556.9 393.4C562.1 386.3 560.5 376.2 553.4 371.1z"/></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640"><path fill="rgb(185, 18, 18)" d="M112 128C85.5 128 64 149.5 64 176C64 191.1 71.1 205.3 83.2 214.4L291.2 370.4C308.3 383.2 331.7 383.2 348.8 370.4L556.8 214.4C568.9 205.3 576 191.1 576 176C576 149.5 554.5 128 528 128L112 128zM64 260L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 260L377.6 408.8C343.5 434.4 296.5 434.4 262.4 408.8L64 260z"/></svg>';
                                ?>
                                <tr>
                                    <td><?= $value->mail_user; ?></td>
                                    <td style="text-align:center !important;"><?= $value->ip_user; ?></td>
                                    <td style="text-align:center !important;"><?= $value->date_mail; ?></td>
                                    <td style="text-align:center !important;"><?= $value->category; ?></td>
                                    <td style="text-align:center !important;"><?= $value->object; ?></td>
                                    <td style="text-align:center !important;"><?= $readMail; ?></td>
                                    <td style="text-align:center !important;"><?= $check; ?></td>
                                    <td>
                                        <a href="contact/delete/<?= $value->id; ?>?admin&option=pages" class="btn btn-danger label-btn label-end rounded-pill">
                                            <?= constant('DELETE'); ?>
                                            <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                        </a>
                                        <a href="contact/read/<?= $value->id; ?>?admin&option=pages" class="btn btn-warning label-btn rounded-pill">
                                            <i class="ri-chat-smile-line label-btn-icon me-2"></i>
                                            <?= constant(name: 'READ'); ?>
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