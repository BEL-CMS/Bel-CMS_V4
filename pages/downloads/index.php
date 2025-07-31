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
<section id="belcms_downloads">
    <div class="accordion" id="accordionExample">
        <?php
        foreach ($cat as $value):
        $name = Common::removeBlank($value->name);
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $name; ?>" aria-expanded="false" aria-controls="flush-collapse<?= $name; ?>"><?= $value->name; ?></button>
            </h2>
            <div id="flush-collapse<?= $name; ?>" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <p><?= $value->description; ?></p>
                    <p><button class="btn btn-info" onclick="location.href='downloads/viewcat/<?= $value->id_groups; ?>'" type="button">Entrer dans la catégorie : <?= $value->name; ?></button></p>
                </div>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</section>