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
<div class="container">
    <div class="row">
        <div class="col-xl-3">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header">
                    <div class="card-title">
                        <?= $infos->name; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-xl-12">
                            <p>
                                <span class="fw-medium text-muted fs-12"><?= $infos->description; ?>
                            </p>
                            <p>
                                <span class="fw-medium text-muted fs-12">Total de visite :</span> <span class="text-success fw-medium fs-14"><?= $infos->visits; ?></span>
                            </p>
                            <p>
                                <span class="fw-medium text-muted fs-12">Date MAJ :</span> <?= Common::TransformDate($infos->date_page, 'MEDIUM', 'MEDIUM') ?></span>
                            </p>
                            <p>
                                <span class="fw-medium text-muted fs-12">Status : Ok</span>
                            </p>
                            <div class="alert alert-success" role="alert">
                                Il n'y a pas de mise à jour
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>