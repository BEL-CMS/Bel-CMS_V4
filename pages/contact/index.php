<?php
/**
 * Bel-CMS [Content management system]
 * *  * @version 4.1.1 [PHP8.5]
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
$readonly = !empty($username) ? 'readonly' : '';
$mail     = !empty($mail) ? $mail : '';
?>
<div id="belcms_page_contact">
    <h2>Formulaire de contact</h2>
    <p>Veuillez remplir le formulaire ci-dessous puis cliquer sur Envoye</p>
    <form action="contact/send" method="post">
        <div class="mb-3 row">
            <label for="staticUser" class="col-sm-2 col-form-label">Votre Nom :</label>
            <div class="col-sm-10">
                <input name="user" <?= $readonly; ?> type="text" class="form-control" id="staticUser" value="<?= $username; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail :</label>
            <div class="col-sm-10">
                <input value="<?= $mail; ?>" name="mail_user" type="email" class="form-control" required id="inputEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Catégorie : </label>
            <div class="col-sm-10">
                <select name="category" class="form-select">
                    <option selected>Veuillez choisir une catégorie</option>
                    <?php
                        foreach ($cat as $value):
                            echo '<option value="'.$value->id.'">'.$value->content.'</option>';
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticObjet" class="col-sm-2 col-form-label">Objet : </label>
            <div class="col-sm-10">
                <input name="object" type="text" class="form-control" id="staticObjet" required>
            </div>
        </div>
        <div class="mb-3 row p-3">
            <textarea class="bel_cms_textarea_simple" name="message"></textarea>
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
        <div class="mb-3 row">
            <input type="submit" class="btn btn-primary mt-3 bg-info text-dark" value="Envoyer" disabled>
        </div>
    </form>
</div>