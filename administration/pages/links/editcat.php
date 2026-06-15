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
                <div class="card-header">
                    <div class="card-title">Éditer une catégorie</div>
                </div>
                <form action="links/sendedit?management&option=pages" method="post">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input name="name" required="required" type="text" class="form-control" id="name" value="<?= $cat->name; ?>">
                            <label for="name">Nom</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="color" type="color" id="color" value="<?= $cat->color; ?>" title="Choisissez votre couleur.">
                            <label for="color" style="margin-left: 75px;margin-top: -10px;">Couleur</label>
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_simple" name="description"><?= $cat->description; ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <input type="hidden" value="<?= $cat->id; ?>" name="id">
                            <button type="submit" class="btn btn-primary">Editer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>