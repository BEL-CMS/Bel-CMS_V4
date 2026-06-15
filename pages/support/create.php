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
<div class="card mb-4">
    <div class="card-header" id="belcms_header_title">
        <h2><i class="fa-solid fa-angles-right"></i> Support</h2>
        <a href="support" title="home support">Accueil</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section">Création du support</h3>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="post" action="support/newsend" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Sujet</label>
                <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Priorité</label>
                <select name="priority" class="form-select">
                    <option value="low">Basse</option>
                    <option value="medium">Moyenne</option>
                    <option value="high">Haute</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="bel_cms_textarea_simple" rows="5" required></textarea>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
                <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
            </div>
            <input type="hidden" name="captcha_value" value="">
            <button class="btn btn-success">Envoyer</button>
        </form>
    </div>
</div>