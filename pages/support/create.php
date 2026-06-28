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
                <label class="form-label">Titre</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sujets</label>
                <select name="subject" class="form-select">
                    <option selected>Veuillez choisir un sujet</option>
                    <?php
                    foreach ($object as $key => $value):
                    ?>
                        <option value="<?= $value->id; ?>"><?= $value->value; ?></option>
                    <?php
                    endforeach;
                    ?>
                    <option value="0">Autre</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Priorité</label>
                <select name="priority" class="form-select">
                    <option value="3">Basse</option>
                    <option value="2" selected>Normal</option>
                    <option value="1">Haute</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Téképhone</label>
                <input type="text" name="phone" class="form-control" placeholder="+32 0 xxx xx xx xx" pattern="^\+?[0-9\s().-]{8,20}$">
            </div>

            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="bel_cms_textarea_simple" rows="5"></textarea>
            </div>

            <div id="belcms_global_captcha">
                <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
                <div class="input-group mb-3">
                    <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
                </div>
                <div class="input-group mb-3">
                    <div class="belcms_captcha_container">
                        <label><?= constant('CAPTCHA_MESSAGE_INDEX'); ?></label>
                        <input type="range" id="belcms_captcha_slider" min="0" max="100" value="15">
                        <div id="belcms_captcha_percent">0%</div>
                        <input type="hidden" name="belcms_captcha_value" id="belcms_captcha_value">
                    </div>
                </div>
            </div>

            <input type="hidden" name="captcha_value" value="">
            <button class="btn btn-success">Envoyer</button>
        </form>
    </div>
</div>