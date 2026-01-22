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
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header">
                    <div class="card-title">
                        Editer l'image <?= $img->name; ?>
                    </div>
                </div>
                <form action="gallery/sendedit?management&option=pages" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input name="name" required="required" type="text" class="form-control" id="name" value="<?= $img->name; ?>">
                            <label for="name">Nom</label>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Description</span>
                                <textarea name="description" class="form-control" spellcheck="true" maxlength="100"><?= $img->description; ?></textarea>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <source style="width: 150px;" src="<?= $img->url; ?>" type="image/webp">
                            <img style="width: 150px;" src="<?= $img->url; ?>" class="glightbox">
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <input class="form-control" name="url_2" readonly id="input-file" value="<?= $img->url; ?>">
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="input-file" class="form-label">Nouvelle image à uploader</label>
                            <input class="form-control" name="url" type="file" id="input-file" accept="image/*, webp">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="input-file" class="form-label">Catégorie</label>
                            <select name="id_cat" class="form-select form-select-sm mb-3">
                                <?php
                                foreach ($cat as $key => $value):
                                    if ($img->cat_id == $value->cat_id):
                                    ?>
                                        <option selected value="<?= $value->cat_id; ?>"><?= $value->name; ?></option>
                                    <?php
                                    else:
                                    ?>
                                        <option value="<?= $value->cat_id; ?>"><?= $value->name; ?></option>
                                    <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $img->id; ?>">
                            <button type="submit" class="btn btn-primary">Editer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>