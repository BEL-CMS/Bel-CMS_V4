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
    <div class="card">
        <div class="card-header"><?=$data->name;?></div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p class="text-align-center mb-5"><img class="glightbox" src="<?=$data->screen;?>"></p>
                <?=$data->desc;?>
            </blockquote>
            <ul class="downloads_list_style">
                <li><span>Hash MD5 : </span><i><?=$data->md5;?></i></li>
                <li><span>Taille : </span><i><?=$data->size;?></i></li>
                <li><span>Catégorie : </span><i><?=$data->nameCat;?></i></li>
                <li><span>Compteur DL : </span><i><?=$data->dls;?></i></li>
                <li><span>Compteur vu : </span><i><?=$data->view;?></i></li>
                <li><span>Type Mime : </span><i><?=$data->typeMime;?></i></li>
                <li><span>Date de parution : </span><i><?=$data->date;?></i></li>
                <li><span>Mise en ligne par : </span><i><?=$data->uploader;?></i></li>
                <li><a style="padding: 0 15px;line-height:30px;" class="btn btn-info" href="Downloads/getDownload/<?=$data->id;?>?echo" target="_blank">Télécharger</a></li>
		    </ul>
        </div>
    </div>
</article>