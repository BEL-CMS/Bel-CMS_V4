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
        <div class="mb-3 row">
            <label for="captcha" class="col-sm-2 col-form-label"><?= $_SESSION['CAPTCHA']['CODE']; ?> : </label>
            <div class="col-sm-10">
                <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
            </div>
        </div>
        <div class="mb-3 row">
            <input type="hidden" name="captcha_value" value="">
            <input type="submit" class="btn btn-primary mt-3 bg-info text-dark" value="Envoyer">
        </div>
    </form>
</div>