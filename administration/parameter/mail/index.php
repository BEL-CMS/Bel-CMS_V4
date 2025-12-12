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
<form action="mail/save?management&option=parameter" method="post">
    <div class="row">
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header justify-content-between">
                    <div class="card-title">Paramètres e-mail</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <span class="input-group-text">host</span>
                            <input type="text" required name="host" class="form-control" placeholder="localhost" value="<?= $data->host; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Port</span>
                            <select class="form-select" name="Port">
                                <option value="587" selected>587</option>
                                <option value="465">465</option>
                                <option value="2525">2525</option> 
                            </select>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">SMTPAuth</span>
                            <select class="form-select" name="SMTPAuth">
                                <option value="true" selected>Activer</option>
                                <option value="false">Désactiver</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">SMTPAutoTLS</span>
                            <select class="form-select" name="SMTPAutoTLS">
                                <option value="1" selected>Activer</option>
                                <option value="0">Désactiver</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">WordWrap</span>
                            <input type="number" min="65" max="600" name="WordWrap" class="form-control" placeholder="65" value="<?= $data->WordWrap; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">E-mail en HTML</span>
                            <select class="form-select" name="IsHTML">
                                <option value="true" selected>Activer</option>
                                <option value="false">Désactiver</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">L'expediteur de l'e-mail</span>
                            <input type="mail" required name="setFrom" class="form-control" value="<?= $data->setFrom; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Nom de l'expediteur de l'e-mail</span>
                            <input type="mail" required name="fromName" class="form-control" value="<?= $data->fromName; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Charset</span>
                            <select class="form-select" name="charset">
                                <option value="UTF-8" selected>UTF-8</option>
                                <option value="Windows-1252">Windows-1252</option>
                                <option value="ISO-8859-1">ISO-8859-1</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header justify-content-between">
                    <div class="card-title">Paramètres e-mail</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <span class="input-group-text">Nom d'utilisateur</span>
                            <input type="text" required name="username" class="form-control" placeholder="username" value="<?= $data->username; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Mot de passe</span>
                            <input type="password" required name="Password" class="form-control" placeholder="********" value="<?= $data->Password; ?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success label-btn label-end">Sauvegarder les changements
                                <i class="ri-thumb-up-line label-btn-icon ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>