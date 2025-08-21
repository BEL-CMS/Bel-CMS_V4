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
?>
<section id="belcms_links">
    <div class="container">
        <div class="row">
            <?php
            foreach ($cat as $value):
            ?>
            <div class="col-lg-6 col-sm-12 col-xsm-12 belcms_links_block">
                <div id="belcms_links_table">
                    <div class="belcms_links">
                        <?= $value->name; ?>
                    </div>
                    <div style="border: 1px solid <?= $value->color; ?>;" class="belcms_links_message">
                        <?php echo Common::truncate($value->description, 150); ?>
                    </div>
                    <button onclick="location.href='Links/viewall/<?= $value->id; ?>';" style="border: 1px solid <?= $value->color; ?>" type="button" class="btn belcms_links_btn"><i class="fa-solid fa-file-lines"></i> Entrer</button>
                </div>
            </div>
            <?php
            endforeach;
            ?>
    <div id="belcms_links_stats">
        ( Il y a <i><?= $nblink; ?></i> Liens & <i><?= $nbcat; ?></i> Catégories dans la base de données )
    </div>
</section>