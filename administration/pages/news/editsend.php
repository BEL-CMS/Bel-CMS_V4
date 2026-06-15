<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header">
                    <div class="card-title">
                        Editer une actualité
                    </div>
                </div>
                <div class="card-body">
                    <form action="News/sendedit?management&option=pages" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input name="name" value="<?=$data->name;?>" required="required" type="text" class="form-control" id="title" placeholder="Titre de l'actualité">
                            <label for="title">Titre de l'actualité</label>
                        </div>
                        <div class="form-floating md-3">
                            <input name="tags" type="text" class="form-control" id="tags" placeholder="Tags ( séparer par des => , )">
                            <label for="tags">Tags ( séparer par des => , )</label>
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="content"><?=$data->content;?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="suite">"Lire la suite"</label>
                            <textarea class="bel_cms_textarea_full" name="additionalcontent"><?=$data->additionalcontent;?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?=$data->id;?>">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>