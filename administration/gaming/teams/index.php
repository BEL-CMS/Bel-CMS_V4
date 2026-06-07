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
                        <?= constant('LIST_OF_TEAMS'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><?= constant('LOGO'); ?></th>
                                    <th style="text-align: center;"><?= constant('NAME'); ?></th>
                                    <th style="text-align: center;"><?= constant('FOUNDATION'); ?></th>
                                    <th style="text-align: center;"><?= constant('CONTACT'); ?></th>
                                    <th style="text-align: center;"><?= constant('JOINING'); ?></th>
                                    <th style="text-align: center;"><?= constant('OPTIONS'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($teams as $key => $value):
                                ?>
                                <tr>
                                    <td width="100px"><img class="glightbox" src="<?= $value->logo; ?>" style="width:100px;height:100px;"></td>
                                    <td><?= $value->name; ?></td>
                                    <td style="text-align:center !important;"><?= Common::TransformDate($value->foundation, 'LONG', 'NONE'); ?></td>
                                    <td style="text-align:center !important;"><a href="<?= $value->contact; ?>"><?= $value->contact; ?></a></td>
                                    <td style="text-align:center !important;">
                                        <?php
                                        if ($value->joining == 1):
                                            echo '<span class="badge bg-secondary-subtle text-secondary"><i class="ri-mail-line"></i> Ouvert</span>';
                                        else:
                                            echo '<span class="badge bg-outline-danger-subtle text-danger border border-danger rounded-pill"><i class="ri-close-line"></i> Fermer</span>';
                                        endif;
                                        ?>
                                    </td>
                                    <td style="text-align:center !important;">
                                        <a href="teams/delete/<?= $value->id; ?>?admin&option=gaming" class="btn btn-danger label-btn label-end rounded-pill">
                                            Supprimer
                                            <i class="ri-close-line label-btn-icon ms-2 rounded-pill"></i>
                                        </a>
                                        <a href="teams/edit/<?= $value->id; ?>?admin&option=gaming" class="btn btn-warning label-btn rounded-pill">
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