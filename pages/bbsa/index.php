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

use BelCMS\Core\Notification;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form action="bbsa/send" method="post">
<h1 id="test_h1">Formulaire d'inscription à un test d'admission « BBSA/BSSA »</h1>
<table id="test_table">
    <tr>
        <td>à :</td>
        <td>La piscine de <strong>Farciennes</strong></td>
        <td><input type="radio" name="lieu" value="Farciennes" class="test_checkbox"></td>
        <td>Le lundi</td>
        <td><input type="date" class="test_input" name="farciennes_date"></td>
    </tr>
    <tr>
        <td></td>
        <td>La piscine de <strong>Montignies-s-S</strong></td>
        <td><input type="radio" name="lieu" value="Montignies-s-S" class="test_checkbox"></td>
        <td>Le mercredi</td>
        <td><input type="date" class="test_input" name="montignie_dates"></td>
    </tr>
    <tr>
        <td colspan="3">* Cochez la piscine de votre choix</td>
        <td colspan="2">** Proposez la date de votre choix</td>
    </tr>
</table>
<table id="test_table">
    <tr>
        <td><strong>Nom</strong> :</td>
        <td><input type="text" name="name" value="" class="test_input_text" required></td>
        <td><strong>Prénom</strong> :</td>
        <td><input type="text" name="username" value="" class="test_input_text" required></td>
    </tr>
    <tr>
        <td><strong>Date de naissance</strong> :</td>
        <td><input type="date" name="birthday" value="" class="test_input_text" required></td>
        <td><strong>N° Registre national</strong> :</td>
        <td><input type="text" class="test_input_text" name="national_number" pattern="^(\d{2}\.\d{2}\.\d{2}-\d{3}\.\d{2}|\d{11})$" placeholder="00.00.00-000.00" required></td>
    </tr>
    <tr>
        <td><strong>N° GSM</strong> :</td>
        <td><input type="tel" class="test_input_text" name="gsm" pattern="^(\+32|0)4\d([ .-]?\d{2}){4}$" placeholder="04xx 12 34 56" required></td>
        <td><strong>Adresse e-mail</strong> :</td>
        <td><input type="email" class="test_input_text" placeholder="@" name="email" required></td>
    </tr>
</table>
<?php 
$text = "<span id='test_text_center'>Une fois la date de votre test confirmée, prése,tez-vous à l'accueil du club à la séance<br>fixée, rélgez les <strong style='border-bottom: 1px dashed red;'>25,00 €</strong> d'accès au test (entrée en piscine comprise).<br>Au signal, entrez au vestiaire. Accès à l'eau à 19h30. Avant le test, vous disposerez d'un<br>temps d'echauffement. Après le test, vous pouvez rester en piscine jusqu'à <strong>21h00</strong>.</span>";
Notification::infos($text);
Notification::error('La validité du test est de 6 mois à daté de la réussite.','Après un test réussi, vous recevrez une attestation (par mail)');
?>
<p id="test_p"><i style="color: red;" class="fa-solid fa-circle-exclamation"></i> En envoyant ce forumulaire, j'accepte les conditions de passage et le cahier des charges imposé par l'<strong>ADEPS</strong>.</p>
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
<div class="row">
    <div class="mb-3" style="text-align: center;">
        <input type="submit" value="Envoyer" id="envoyer" class="test_input_text">
    </div>
</div>
<table>
    <thead><tr><th colspan="2"><strong>Informations pratiques</strong></th></tr></thead>
    <tr>
        <td>Piscine de Farciennes</td>
        <td>15 Rue de la Jeunesse</td>
    </tr>
    <tr>
        <td>Piscine de Montignies-sur-Sambre</td>
        <td>Rue du Poirier 226</td>
    </tr>
</table>
</form>