<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
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
<form action="Forum/sendseconcat?management&option=pages" method="post">
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
                            Ajouter une catégorie secondaire
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="cattitle" class="form-label">Nom de la catégorie principal</label>
                                <select name="id_forum" class="mt-3 mb-3 js-example-placeholder-single js-states form-control">
                                <?php
                                foreach ($cat as $key => $value):
                                ?>
                                    <option value="<?= $value->id;?>"><?= $value->title;?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="title" required="required" type="text" class="form-control" id="title" placeholder="">
                            <label for="title">Titre de la catégorie secondaire</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="subtitle" type="text" class="form-control" id="subtitle" placeholder="sous-Titre">
                            <label for="subtitle">Sous-titre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="orderby" type="number" min="1" class="form-control" id="orderby" value="1">
                            <label for="orderby">Ordre</label>
                        </div>
                        <div class="mb-3">
                            <label for="caticon" class="form-label">Icon <span style="color:red;font-weight:bold;">* <a style="color:red;" href="https://fontawesome.com/search?ic=free" target="_blank">Voir ici</a></span></label>
                            <input id="caticon" value="" type="text" class="form-control" name="icon" placeholder="fa-solid fa-house">
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary"><?= constant('ADD'); ?></button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
