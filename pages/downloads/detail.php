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

 if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<article id="section_downloads">
    <div class="section_downloads_cat">
    <?php
    foreach ($data as $v):
    ?>
    <div class="card">
        <div class="card-header"><?=$v->name;?></div>
        <div class="card-body">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Catégorie</h5>
                        <p class="card-text"><?=$v->nameCat;?></p>
                    </div>
                    <div class="col">
                        <h5 class="card-title">Taille</h5>
                        <p class="card-text"><?=$v->size;?></p>
                    </div>
                    <div class="col">
                        <h5 class="card-title">Type</h5>
                        <p class="card-text"><?=$v->typeMime;?></p>
                    </div>
                    <div class="col">
                        <h5 class="card-title">date</h5>
                        <p class="card-text"><?=$v->date;?></p>
                    </div>
                    <div class="col align-right">
                        <a href="Downloads/view/<?=$v->id;?>" class="btn btn-primary">Details +</a>
                    </div>
                </div>
                <div class="row" id="hash_md5">
                    <div class="col-10">
                        <span>Hash MD5 :</span> <?=$v->md5;?>
                    </div>
                    <div class="col-2 align-right">
                        <a href="Downloads/getDownload/<?=$v->id;?>" class="btn btn-secondary">Télécharger</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    endforeach;
    ?>
</article>
