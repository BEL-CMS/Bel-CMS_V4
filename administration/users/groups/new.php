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
                       Ajouter un groupe
                    </div>
                </div>
                <div class="card-body">
                    <form action="groups/add?admin&option=users" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nom du nouveau groupe</label>
                            <input type="text" class="form-control" required name="name"
                                placeholder="Nom du groupe, sans aucun espace" onkeydown="if(event.keyCode==32) return false;">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label class="form-label">Couleur d'affichage</label>
                            <input class="form-control form-input-color" type="color" name="color" required  value="#136bd0">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="input-file" class="form-label">Image du groupe</label>
                            <input class="form-control" name="image" type="file" id="input-file" accept="image/*">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Description</span>
                                <textarea name="description" class="form-control" data-lt-tmp-id="lt-628138" spellcheck="true" style="line-height: 25.2px;"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-warning rounded-pill" type="submit">
                            Sauvegarder
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>