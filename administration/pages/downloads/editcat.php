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

use BelCMS\Requires\Common;


if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

if (empty($data->banniere)) {
    $file = 'assets/img/no-image-png.png';
} else {
    $file = $data->banniere;
}
if ($data->banniere == '/uploads/downloads/cat/UPLOAD_NONE') {
    $file = 'assets/img/error-file.png';
}
?>
<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Editer une catégorie
                    </div>
                </div>
                <form action="Downloads/sendeditcat?management&option=pages" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input name="name" required="required" value="<?=$data->name;?>" type="text" class="form-control" id="name" placeholder="Titre de la catégorie">
                            <label for="name">Nom de la catégorie</label>
                        </div>
                        <div class="input-group mb-3">
                            <source style="width: 125px;" src="<?=$file;?>" type="image/webp">
                            <img style="width: 125px;" src="<?=$file;?>" class="glightbox">
                        </div>
                        <div class="input-group mb-3">
                            <a href="<?=$data->banniere;?>"><?=$data->banniere;?></a>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Affiche</span>
                            <span class="input-group-text"><?=ini_get(option: 'upload_max_filesize');?> max</span>
                            <input type="file" name="download" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="form-floating mb-3">
                            <input name="ico" type="text" class="form-control" id="ico" value="<?=$data->ico;?>">
                            <label for="ico">Icône <i><span style="color: red;">*</span></label>
                        </div>
                            <div class="mb-3">
                                <span style="color: red;">*</span> <a style="text-decoration: dotted;color:red" target="_blank" href="https://fontAwesome.com/search?o=r&ic=free&s=solid&ip=classic">icône&nbsp;&nbsp;fontawesome 6.7.2</a>&nbsp;&nbsp;<i style="color: green;margin:0 5px">**</i>seulement le <i style="text-decoration: green wavy underline;">"fa-solid fa-igloo"</i>
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="description"><?=$data->description;?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?=$data->id;?>">
                            <button type="submit" class="btn btn-warning-gradient btn-wave">Editer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>