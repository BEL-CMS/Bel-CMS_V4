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
?>
<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Editer un téléchargement
                    </div>
                </div>
                <form action="Downloads/editnew?management&option=pages" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input value="<?=$data->name?>" name="name" required="required" type="text" class="form-control" id="name" placeholder="Titre du téléchargement">
                            <label for="name">Nom</label>
                        </div>                        
                        <div class="mb-3">
                            <select name="idcat" class="form-control">
                                <option value="0">Veuillez choisir une catégorie</option>
                                <?php
                                foreach ($cat as $key => $value):
                                ?>
                                    <option value="<?=$value->id;?>"><?=$value->name;?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="description"><?=$data->description;?></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Fichier</span>
                            <span class="input-group-text"><?=ini_get(option: 'upload_max_filesize');?> max</span>
                            <input type="file" name="download" class="form-control" id="inputGroupFile01">
                        </div>
                        <?php
                        if (!empty($data->screen)):
                        ?>
                        <div class="mb-3">
                            <img style="max-width:150px;margin: 50px;" src="<?=$data->screen;?>">
                        </div>
                        <?php
                        endif;
                        ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Image</span>
                            <span class="input-group-text"><?=ini_get(option: 'upload_max_filesize');?> max</span>
                            <input type="file" accept="image/*" name="screen" class="form-control" id="inputGroupFile01">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <input name="id" type="hidden" value="<?=$data->id;?>">
                            <button type="submit" class="btn btn-warning-gradient btn-wave">Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>