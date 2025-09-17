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

use Belcms\Pages\Models\Articles;
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
                <th scope="col">Nom</th>
                <th scope="col">Date de parution</th>
                <th scope="col">Nombre de page(s)</th>
                <th scope="col">Nombre de vu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $value):
                $countView = Articles::getCountView($value->id_articles);
            ?>
                <tr>
                    <th scope="row">
                        <a href="articles/getpages/<?= $value->id_articles; ?>" class=""><?= $value->name; ?></a>
                    </th>
                    <td><?= Common::TransformDate($value->publish, 'FULL', 'MEDIUM'); ?></td>
                    <td><?= $value->nbpage; ?></td>
                    <td><?= $countView; ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</section>