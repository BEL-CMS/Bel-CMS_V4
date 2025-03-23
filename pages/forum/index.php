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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\Requires\Common;

?>
<div id="belcms_main_forum">
    <h1 style="display: none;">Forum</h1> <!-- Only SEO -->
    <?php
    foreach ($forum as $key => $value):
    ?>
        <h2><?= $value->title; ?></h2>
        <div class="belcms_grid_contenair">
            <?php
            foreach ($value->threads as $vthread):
            ?>
                <div class="belcms_grid_contenair_box">
                    <a href="Forum/Threads/<?= $vthread->id; ?>/<?= Common::replaceTo($vthread->title, ' ', '_'); ?>" title="<?= $vthread->title; ?>" class="belcms_grid_contenair_a">
                        <i class="<?= $vthread->icon; ?>"></i>
                        <h3><?= $vthread->title; ?></h3>
                        <p><?= $vthread->subtitle; ?></p>
                    </a>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    <?php
    endforeach;
    ?>
</div>