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
                        Ajouter une catégorie
                    </div>
                </div>
                <form action="Downloads/sendnewcat?management&option=pages" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input name="name" required="required" type="text" class="form-control" id="name" placeholder="Titre du téléchargement">
                            <label for="name">Nom</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Affiche</span>
                            <span class="input-group-text"><?=ini_get(option: 'upload_max_filesize');?> max</span>
                            <input type="file" name="download" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="form-floating mb-3">
                            <input name="ico" type="text" class="form-control" id="ico" value="fa-solid fa-file" placeholder="fa-solid fa-house-flag">
                            <label for="ico">Icône <i><span style="color: red;">*</span></label>
                        </div>
                            <div class="mb-3"><span style="color: red;">*</span> <a style="text-decoration: dotted;color:red" href="https://fontAwesome.com/search?o=r&ic=free&s=solid&ip=classic">icône  fontawesome</a>
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="description"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning-gradient btn-wave">Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>