<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
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
<form action="training/sendActivity?admin&option=aseh" method="post">
    <div class="row">
        <div class="col-12 col-xl-6 mt-3">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                       <div class="input-group">
                            <div class="input-group-text">
                                <input name="Lieu" class="form-check-input f-s-18 mb-1" type="radio" value="farciennes" required>
                            </div>
                            <input type="text" class="form-control" value="Farciennes" readonly>
                        </div>
                       <div class="input-group">
                            <div class="input-group-text">
                                <input name="Lieu" class="form-check-input f-s-18 mb-1" type="radio" value="farciennes" required>
                            </div>
                            <input type="text" class="form-control" value="Montignies-sur-sambre" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6 mt-3">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="tab-pane active show" id="man-password" role="tabpanel" tabindex="0" aria-labelledby="man-password-tab">
                        <div>
                            <div class="mb-4">
                                <label for="date" class="form-label">Date de l'entraînement</label>
                                <input type="date" name="date" class="form-control" id="date" required>
                            </div>
                            <div class="mb-4">
                                <label for="heure_debut" class="form-label">Heure de début</label>
                                <input type="time" name="time_1" class="form-control" id="heure_debut" required>
                            </div>
                            <div class="mb-4">
                                <label for="date_fin" class="form-label">Heure de fin</label>
                                <input type="time" name="time_2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-12 mt-3 mb-5"><button type="submit" class="btn btn-primary">Sauvegarder</button></div>
</form>