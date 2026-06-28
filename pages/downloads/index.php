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
<div class="card">
    <div class="card-header" id="belcms_header_title">
        <h2><i class="fa-solid fa-angles-right"></i> Téléchargements</h2>
        <a href="downloads/charte" title="view read">Charte</a>
        <a href="downloads" title="home guestbook">Accueil</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section">Bienvenue sur la page des téléchargements</h3>
        <h4 id="belcms_sub_title_section">Votre ressource est ici, est prête à être téléchargée.</h4>
    </div>
</div>

<div class="card shadow-sm mt-5">
    <div class="card-header bg-white d-flex align-items-center">
        <svg class="svg-inline--fa fa-file text-primary me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
            <path fill="currentColor" d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"></path>
        </svg>
        <h2 class="h5 mb-0">Catégories</h2>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            <?php
            foreach ($cat as $key => $value):
                $ico = (empty($value->ico)) ? '' : '<i class="fa ' . $value->ico . '"></i>';
                $name = Common::FormatName($value->name);
            ?>
                <div class="col">
                    <a class="subcat card h-100 border-0" href="downloads/category/<?= $value->id; ?>/<?= $name; ?>">
                        <div class="card-body belcms_card_body_bg">
                            <h3 class="h6 mb-1"><?= $ico; ?> <?= $value->name; ?></h3>
                            <p class="small text-secondary mb-2"><?= $value->description; ?></p>
                            <span class="badge bg-primary-subtle text-primary me-2">Nombre de fichier(s) <?= $value->countNbDls; ?></span>
                        </div>
                    </a>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>