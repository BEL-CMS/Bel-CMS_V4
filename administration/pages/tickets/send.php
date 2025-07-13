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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form method="post" action="tickets/submit" enctype="multipart/form-data">
    <div class="col-xl-12">
        <div class="mb-3 row">
            <label class="col-lg-3 col-form-label form-label required" for="validationCustom01">Ticket sujet(s)</label>
            <div class="col-lg-9">
                <select name="cat" class="form-select" aria-label="Default select example">
                    <option selected>Ouvrir ce menu de sélection</option>
                    <?php
                    foreach ($cat as $key => $value):
                    ?>
                        <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-lg-3 col-form-label form-label required">Adresse email</label>
            <div class="col-lg-9">
                <input type="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required class="form-control" placeholder="votre email valide.." required="" value="<?= $_SESSION['USER']->user->mail; ?>">
                <div class="invalid-feedback">
                    Veuillez saisir une adresse e-mail.
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-lg-3 col-form-label form-label required">Ticket Description</label>
            <div class="col-lg-9">
                <textarea name="content" class="bel_cms_textarea_full"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-lg-3 col-form-label form-label">Fichier </label>
            <div class="col-lg-9">
                <div class="ticket-file">
                    <input type="file" name="file" class="form-control" accept="image/*,.pdf, video*, audio/*,.doc,.docx">
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-lg-9 ms-auto">
                <div class="input-group mb-1">
                    <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
                    <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
                </div>
                <input type="hidden" value="" name="captcha_value">
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </div>
    </div>
</form>