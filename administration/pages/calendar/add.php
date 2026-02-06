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
use BelCMS\Core\groups;

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
                        Ajouter un évènement
                    </div>
                </div>
                <form action="calendar/sendnew?management&option=pages" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Nom de l'évènement</span>
                            <input type="text" name="name" class="form-control" placeholder="" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Image</span>
                            <input type="file" accept="image/*" name="image" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">date de début </span>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">date de fin</span>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Debût de l'événement</span>
                            <input type="time" min="0" name="start_time" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Fin de l'événement</span>
                            <input type="time" min="0" name="end_time" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <select id="color" name="color" class="form-control">
                                <option value="0">-- Veuillez choisir une option de couleur --</option>
                                <option value="1" style="background:#ffd15c; color:#FFF;">Couleur #ffd15c</option>
                                <option value="2" style="background:#f21e4e; color:#FFF;">Couleur #f21e4e</option>
                                <option value="3" style="background:#6c6ce5; color:#FFF;">Couleur #6c6ce5</option>
                                <option value="4" style="background:#1da1f3; color:#FFF;">Couleur #1da1f3</option>
                                <option value="5" style="background:#be31a1; color:#FFF;">Couleur #be31a1</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Localisation</span>
                            <input type="text" name="location" class="form-control">
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="description"></textarea>
                        </div>
                        <div class="btn-list">
                            <button type="submit" class="btn btn-warning-gradient btn-wave">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>