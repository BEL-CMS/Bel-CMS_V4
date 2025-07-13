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
    <table class="table">
        <thead>
            <tr>
                <th>Nom de la page : <?=$article->name;?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                    echo $article->content;
                    ?>
                </td>
            </tr>
        </tbody>
        <tfoot align="center">
            <th>Date de mise en ligne de ce contenu : <?= Common::TransformDate($article->publish, 'FULL', 'MEDIUM');?></th>
        </tfoot>
    </table>
</section>