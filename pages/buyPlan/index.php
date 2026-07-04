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

use BelCMS\Core\Notification;
use BelCMS\Core\User;

if (User::isLogged()) {
    $email = $_SESSION['USER']->user->mail;
    $activeMail = 'readonly';
} else {
    $email = null;
    $activeMail = null;
}
### Variable utilisé ###
$textarea = null;
$domaine  = array();
$emails   = array();
$currency = null;
$plan     = null;
### Variable utilisé ###

if (isset($_GET['plan'])) {
    switch ($_GET['plan']) {
        case '1':
            $textarea = '
            <ol>
                <li>Espace du disque dur FTP est de <i style="font-weight:700">250 Mo.</i></li>
                <li>Un e-mail de type xxx.@belcms.dev <em style="color: red;">*si disponible</em>.</li>
                <li>Un domaine comme ceci : xxx.bel-cms.dev <em style="color: red;">*si disponible</em>.</li>
                <li>Un acc&egrave;s &agrave; PhpMyAdmin de <i style="font-weight:700">100 mo</i>, Faite attention ! Aucune sauvegarde ne sera faite, &agrave; Après la fin de votre Plan d\'hébergement, je conserve les données FTP/SQL pendant un mois.</li>
                <li>Possibilit&eacute; de changer de plan d\'h&eacute;bergement pour plus haut sans perte de donn&eacute;es.</li>
                <li>Une redirection vers un autre nom de domaine envisageable, gratuitement.</li>
            </ol>';
            $plan = 1;
            $currency = '2,50';
            $domaine  = array('domaine_1' => '1er sous-domaine');
            $emails   = array('email' => '1er e-mail demander');
        break;
        case '2':
            $textarea = '
            <ol>
                <li>Espace du disque dur FTP est de <i style="font-weight:700">500 Mo</i>.</li>
                <li>Trois e-mail de type xxx.@belcms.dev <em style="color: red;">*si disponible</em>.</li>
                <li>Deux sous domaine comme ceci : xxx.bel-cms.dev <em style="color: red;">*si disponible</em>.</li>
                <li>Un acc&egrave;s &agrave; PhpMyAdmin <i style="font-weight:700">200 mo</i>, sauvegarde mensuel (FTP/SLQ), Après la fin de votre Plan d\'hébergement, je conserve les données FTP/SQL pendant un mois.</li>
                <li>Possibilit&eacute; de changer de plan d\'h&eacute;bergement pour plus haut sans perte de donn&eacute;es.</li>
                <li>Une redirection vers un autre nom de domaine envisageable, gratuitement.</li>
            </ol>';
            $plan = 2;
            $currency = '6.00';
            $domaine  = array('domaine_1' => 'Premier sous-domaine', 'domaine_2' => 'Deuxième sous-domaine');
            $emails   = array('email_1' => 'Premier e-mail demander', 'email_2' => 'Deuxième e-mail demander','email_3' => 'Troisième e-mail demander');
        break;
        case '3':
            $textarea = '
            <ol>
                <li>Espace du disque dur FTP est de <i style="font-weight:700">1 Go (1024 Mo) + (1GB backup)</i>.</li>
                <li>Cinq e-mail de type xxx.@belcms.dev <em style="color: red;">*si disponible</em>.</li>
                <li>Trois sous domaine comme ceci : xxx.bel-cms.dev <em style="color: red;">*si disponible</em>.</li>
                <li>Un acc&egrave;s &agrave; PhpMyAdmin <i style="font-weight:700">250 mo</i></li>
                <li>sauvegarde journalier du (FTP/SLQ), Après la fin de votre Plan d\'hébergement, je conserve les données FTP/SQL pendant un mois.</li>
                <li>Une redirection vers un autre nom de domaine envisageable, gratuitement.</li>
            </ol>';
            $plan = 3;
            $currency = '22.50';
            $domaine  = array('domaine_1' => 'Premier sous-domaine', 'domaine_2' => 'Deuxième sous-domaine', 'domaine_3' => 'Troisième sous-domaine');
            $emails   = array('email_1' => 'Premier e-mail demander', 'email_2' => 'Deuxième e-mail demander','email_3' => 'Troisième e-mail demander', 'email_4' => 'Quatrième e-mail demander', 'email_5' => 'Cinquième e-mail demander');
        break;
    }
} else {
    $textarea = null;
}
?>
<form action="buyPlan/buy" method="post" enctype="multipart/form-data">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex">
                <h2 class="h5 mb-0"><i class="fa-regular fa-file-word"></i>  Demande d'un service web</h2>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Entrer votre e-mail" value="<?= $email; ?>" <?= $activeMail; ?> required>
                    <span class="input-group-text">E-Mail</span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" min="1" max="20" name="plan" class="form-control" placeholder="Nom du plan" value="Plan n° <?= $plan; ?>" readonly required>
                    <span class="input-group-text">Plan</span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" min="2.50" max="25.00" name="currency" step="any" class="form-control" value="<?= $currency; ?>" readonly required>
                    <span class="input-group-text">€</span>
                </div>
                <div class="input-group mb-3">
                    <div id="content"><?= $textarea; ?></div>
                </div>
                <?php
                Notification::warning('La saisie d\'<b>un</b> sous-domaine et d\'<b>un</b> e-mail est obligatoire, les autres champs étant facultatifs.');
                foreach ($domaine as $key => $value):
                    $email_1 = $key == 'domaine_1' ? 'required' : ''; 
                    echo '<div class="input-group mb-3">
                        <input '.$email_1.' id="ndd" type="text" min="3" max="64" name="website[]" class="form-control check_ndd" placeholder="'.$value.'" autocomplete="off">
                        <span class="input-group-text resultat_ndd">ndd.bel-cms.dev</span>
                    </div>';
                endforeach;
                ?>
                <br>
                <hr>
                <br>
                <?php
                foreach ($emails as $key => $value):
                    $email_1 = $key == 'email_1' ? 'required' : ''; 
                    echo '<div class="input-group mb-3">
                        <input '.$email_1 .' id="mails" type="text" min="3" max="64"  name="emailbelcms[]" class="form-control check_mail" placeholder="'.$value.'" autocomplete="off">
                        <span class="input-group-text resultat_mails">xxx@bel-cms.dev</span>
                    </div>';
                endforeach;
                ?>
                <br>
                <hr>
                <br>
                <div class="input-group mb-3">
                    <select name="phpversion" class="form-select" required>
                        <option value="PHP 5.6">PHP 5.6</option>
                        <option value="PHP 7.0">PHP 7.0</option>
                        <option value="PHP 7.1">PHP 7.1</option>
                        <option value="PHP 7.2">PHP 7.2</option>
                        <option value="PHP 7.3">PHP 7.3</option>
                        <option value="PHP 7.4">PHP 7.4</option>
                        <option value="PHP 8.0">PHP 8.0</option>
                        <option value="PHP 8.1">PHP 8.1</option>
                        <option value="PHP 8.2">PHP 8.2</option>
                        <option value="PHP 8.3">PHP 8.3</option>
                        <option value="PHP8.4" selected>PHP 8.4</option>
                    </select>
                </div>
                <br>
                <hr>
                <div class="belcms_buy_comments"><i class="fa-solid fa-question" style="color:red;margin-right:5px"></i><strong style="font-weight:bold;text-decoration: dashed;">Commentaire : </strong><p>Le sous-domaine ainsi que les e-mails peuvent être de type <b style="text-decoration: dashed;">xxx.palacewar.eu</b> ou <b style="text-decoration: dashed;">xxx.world-pc.ovh</b><br>N'hésitez pas à me le faire savoir dans les commentaires.</div>

                <div class="input-group mb-3">
                    <textarea class="bel_cms_textarea_simple" name="comment"></p></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="files" name="file" accept="image/*,.pdf, text/plain, .nfo">
                </div>
                 <p style="text-align: center;"><i style="color: red;margin-right:5px;" class="fa-solid fa-alarm-clock"></i><span style="color: #ff9900;"><strong>L'activation du nom de domaine et des acc&egrave;s FTP/SQL s'effectuera quotidiennement entre 10h et 20h.</strong></span></p>
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
            <div class="card-footer bg-white small text-secondary">
                <div class="input-group mb-1 mt-1">
                    <input type="hidden" name="plan" value="<?= $plan; ?>">
                    <input type="hidden" name="captcha_value" value="">
                    <input class="btn btn-secondary btn_belcms" type="submit" value="Vous accepter le contrat ci-dessous et effectuer votre demande.">
                </div>
            </div>
        </div>
    </div>
    <ul id="ulStatsServer">
        <li><i style="color:red;" class="fa-solid fa-triangle-exclamation"></i> Configuration du serveur :</li>
        <li>Hebergement: <span>OVH Gravelines (GRA) - France</span></li>
        <li>OS : <span>Debian 12</span></li>
        <li>Processeur : <span>4 vCore Intel XEON Server 4800Mhz </span></li>
        <li>Ram : <span>8 Go</span></li>
        <li>Stockage : <span>SSD NVMe</span></li>
        <li>Bande passante : <span>1 Gbit/s illimitée</span></li>
        <li>Localisation : <span>Gravelines (GRA) - France</span></li>
        <li>Backup automatisé : <span>journalière</span></li>
        <li>Liste des PHP disponibles : 
            <span>PHP 5.6; PHP 7.0 ; PHP 7.1 ; PHP 7.2 ; PHP 7.3 ; PHP 7.4 ; PHP 8.0 ; PHP 8.1 ; PHP 8.2 ; PHP 8.3 ; PHP 8.4</span>
        </li>
        <li>Autorisé : <span>Photo à caractère érotique, fichier conforme à la loi, site pornographiques de + 18ans.</li>
        <li>Interdit : <span>Il est interdit de publier des contenus pornographiques impliquant des mineurs ou des fichiers illégaux (warez).</span></li>
        <li>L’infrastructure possède un anti-DDoS contre les acteurs malveillants.</li>
    </ul>
</form>
