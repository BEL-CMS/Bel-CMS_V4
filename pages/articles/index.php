<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
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
<article id="section_articles">
    <div class="card">
        <div class="card-header">Articles</div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Categorie</th>
                    <th scope="col">Nombre d'article</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $key => $v):
                ?>
                <tr>
                    <td><a style="text-decoration: none;" href="Articles/subpage/<?=$v->id?>/<?=Common::MakeConstant($v->name)?>"><?=$v->name?></a></td>
                    <td><?=$v->count?></td>
                <tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</article>