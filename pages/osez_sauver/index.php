<?php

/**
 * Bel-CMS [Content management system]
*  * @version 4.1.1 [PHP8.5]
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
<div class="card">
    <form action="osez_sauver/send" method="post">
        <div class="card-header" id="belcms_header_title">
            <h2><i class="fa-solid fa-angles-right"></i> Formation d'inscription à la formation « Osez sauver »</h2>
            <a href="downloads/charte" title="view read">Date : <?= $date; ?></a>
        </div>
        <div class="card-body bg-light" style="text-align: initial;">
            <p style="font-size: 14px;">à :: <b><?= $lieu; ?></b>&nbsp;&nbsp;<a class="belcms_tooltip_right" data="<?= $adress; ?>e" style="cursor: pointer;">?</a></p>
            <div class="row mb-3">
                <div class="col-6" style="text-align: right; padding:0;">De : <b style="text-decoration: underline dotted;"><?= $heure_debut; ?></b>&nbsp;</div>
                <div class="col-6" style="padding:0;"> à : <b style="text-decoration: underline dotted;"><?= $heure_fin; ?></b></div>
            </div>
            <div class="row">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text">Nom</span>
                    <input type="text" class="form-control" name="name" required>
                    <span class="input-group-text">Prénom</span>
                    <input type="text" class="form-control" name="username" required>
                </div>
            </div>
            <div class="row">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text">Date de naissance</span>
                    <input type="date" class="form-control" placeholder="" name="birthday" required>
                    <span class="input-group-text">N° Registre national</span>
                    <input type="text" class="form-control" name="national_number" pattern="^(\d{2}\.\d{2}\.\d{2}-\d{3}\.\d{2}|\d{11})$" placeholder="00.00.00-000.00" required>
                </div>
            </div>
            <div class="row">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text">N° GSM</span>
                    <input type="tel" class="form-control" name="gsm" pattern="^(\+32|0)4\d([ .-]?\d{2}){4}$" placeholder="1234 12 34 56" required>
                </div>
            </div>
            <div class="row">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text">Adresse e-mail</span>
                    <input type="email" class="form-control" placeholder="@" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3" style="text-align: center;">
                    <input type="submit" value="Envoyer" id="envoyer">
                </div>
            </div>
            <div class="row">
                <div class="mb-3">
                    <p style="color:blue; display: block; padding: 0 50px;text-align:center;font-size:larger;">En envoyant ce formulaire, je m'engage à verser la somme de <b style="text-decoration: underline dotted #000000;">35,00 €</b> sur le N° compte qui me sera fourni à la confirmation de réception.</p>
                </div>
                <div class="mb-3">
                    <p style="display:block;font-size: 20px;text-align:center;padding:10px 0;"><b style="color: red;text-decoration: wavy underline #bd1111;">Votre inscription ne sera enregistrée qu'une fois payée.</b></p>
                    <p style="color: #bd1111;text-align:center; font-size: 16px;">En cas d'absence, les frais d'inscription à la formation ne seront pas remboursés</p>
                </div>
            </div>

            <div class="row" id="belcms_global_captcha">
                <div id="belcms_global_captcha_style">
                    <span>Il faut passer par une vérification de sécurité.</span>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Résolvez le calcul : <?= $_SESSION['CAPTCHA']['question'] ?? 'Chargement...' ?></span>
                        <input type="number" name="captcha" class="form-control" placeholder="Votre réponse" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="belcms_captcha_container">
                            <label><?= constant('CAPTCHA_MESSAGE_INDEX'); ?></label>
                            <input type="range" id="belcms_captcha_slider" min="0" max="100" value="15">
                            <div id="belcms_captcha_percent">0%</div>
                            <input type="hidden" name="belcms_captcha_value" id="belcms_captcha_value">
                            <input type="hidden" name="captcha_value" value="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>