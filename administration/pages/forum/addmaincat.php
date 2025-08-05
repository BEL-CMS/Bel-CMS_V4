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
<form action="Forum/AddCatMain?management&option=pages" method="post" enctype="multipart/form-data">
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
                            Ajouter une catégorie principal
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="cattitle" class="form-label">Nom de la catégorie principal</label>
                            <input id="cattitle" type="text" class="form-control" required name="title">
                        </div>
                        <div class="mb-3">
                            <label for="catsubtitle" class="form-label">Sous-titre</label>
                            <input id="catsubtitle" type="text" class="form-control" name="subtitle">
                        </div>
                        <div class="mb-3">
                            <label for="caticon" class="form-label">Icon <span style="color:red;font-weight:bold;">* <a style="color:red;" href="https://fontawesome.com/search?ic=free" target="_blank">Voir ici</a></span></label>
                            <input id="caticon" type="text" class="form-control" name="icon" placeholder="fa-solid fa-house">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary-gradient btn-wave">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>