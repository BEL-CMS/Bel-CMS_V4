<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
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
                <div class="card-header">
                    <div class="card-title">
                        Liste des ventes
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;"><?= constant('MAIL_USER'); ?></th>
                                    <th style="text-align: center;"><?= constant('IP'); ?></th>
                                    <th style="text-align: center;"><?= constant('DATE'); ?></th>
                                    <th style="text-align: center;"><?= constant('CURRENCY'); ?></th>
                                    <th style="text-align: center;"><?= constant('PHP_VER'); ?></th>
                                    <th style="text-align: center;"><?= constant('ACTIVE'); ?></th>
                                    <th style="text-align: center;"><?= constant('KEY_UNIQUE'); ?></th>
                                    <th style="text-align: center;"><?= constant('VIEW'); ?></td>
                                    <th style="text-align: center;"><?= constant('TIME_FINISH'); ?></th>
                                    <th style="text-align: center;"><?= constant('OPTIONS'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($users as $key => $value):
                                    $now = new DateTime();
                                    $date = new DateTime($value->date_end);
                                    $verifyDate = ($date < $now) ? 'style="background:red;color:#FFF;"' : 'style="background:green;color:#FFF;"';
                                ?>
                                <tr>
                                    <td><?= $value->id; ?></td>
                                    <td><?= $value->mail_user; ?></td>
                                    <td align="center"><?= $value->ip; ?></td>
                                    <td><?= Common::TransformDate($value->dateinsert, 'FULL', 'MEDIUM'); ?></td>
                                    <td align="center"><?= $value->currency; ?></td>
                                    <td align="center"><?= $value->phpversion; ?></td>
                                    <td align="center"><?= $value->active; ?></td>
                                    <td align="center"><?= $value->unique_key; ?></td>
                                    <td align="center"><a href="buyplan/content?admin&option=pages&key=<?= $value->unique_key; ?>"><i class="fa-solid fa-file-lines"></i></a></td>
                                    <td align="center" <?= $verifyDate; ?>><?= Common::TransformDate($value->date_end, 'MEDIUM', 'MEDIUM'); ?></td>
                                    <td align="center"></td>
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