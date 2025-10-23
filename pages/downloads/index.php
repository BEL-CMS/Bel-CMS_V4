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
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="downloads"><i class="fa-solid fa-download"></i> <?= $_SESSION['CONFIG']['CMS_NAME']; ?> :: Téléchargements</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="downloads">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="downloads/charte">Charte</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="bg-light border-bottom">
    <div class="container">
        <h1 class="fw-semibold mb-2 belcms_bnv" id="belcms_bnv">Votre ressource est ici, est prête à être téléchargée.</h1>
        <p class=" lead text-secondary" style="text-align: center;"></p>
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