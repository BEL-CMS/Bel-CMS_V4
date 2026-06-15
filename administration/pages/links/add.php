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
function getMaximumFileUploadSize() {
    return min(Common::convertPHPSizeToBytes(ini_get('post_max_size')), Common::convertPHPSizeToBytes(ini_get('upload_max_filesize')));
}
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
                        Editer le lien
                    </div>
                </div>
                <form action="links/send?management&option=pages" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input placeholder="https://" name="link" required="required" type="url" class="form-control" id="url">
                            <label for="url">URL</label>
                        </div>
                        <div class="mb-3">
                            <select name="cat" class="form-select">
                                <option>Veuillez choisir une catégorie</option>
                                <?php
                                foreach ($cat as $key => $value):
                                ?>
                                    <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="name" required="required" type="text" class="form-control" id="name">
                            <label for="name">Nom</label>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="file"><?= Common::ConvertSize(getMaximumFileUploadSize()); ?></label>
                            <input name="img" type="file" class="form-control" id="file" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_simple" name="description"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>