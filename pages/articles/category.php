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
<section id="belcms_articles">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th width="80px">Page n°</th>
                <th>Nom de la page :</th>
                <th>Date de mise en ligne de ce contenu :</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($category as $content):
            ?>
                <tr>
                    <td align="center"><?= $content->pagenumber; ?></td>
                    <td><a href="articles/view/<?= $content->id_articles; ?>/<?=$content->pagenumber;?>/<?= Common::MakeConstant($content->name); ?>"><?= $content->name; ?></a></td>
                    <td><?= Common::TransformDate($content->publish, 'FULL', 'MEDIUM'); ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</section>