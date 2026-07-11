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
use BelCMS\Requires\Common;

?>
<div class="container">
    <div class="card invoice-card p-4 p-md-5">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="text-primary mb-1"><?= $data->enterprise; ?></h2>
                <p class="text-muted"><?= $data->adress; ?><br><?= $data->mail; ?><br><?= $data->siret; ?></p>
            </div>
            <div class="col-sm-6 text-sm-end">
                <h4 class="text-uppercase fw-bold">Facture</h4>
                <p class="mb-0">Référence : <i style="font-weight: bold !important;"><?= $buy->unique_key; ?></i></p>
                <p>Date : <i style="font-weight: bold !important;"><?= Common::TransformDate($buy->dateinsert, 'FULL', 'MEDIUM'); ?></i></p>
            </div>
        </div>
        <hr>
        <div class="row my-4">
            <div class="col-sm-6">
                <h6 class="text-muted">Facturé à :</h6>
                <h5><?= $buy->mail_user; ?></h5>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead class="border-bottom">
                    <tr>
                        <th><i style="font-weight: bold;">Description</i></th>
                        <th class="text-center"><i style="font-weight: bold;">Quantité</i></th>
                        <th class="text-center"><i style="font-weight: bold;">Prix Unitaire</i></th>
                        <th class="text-center"><i style="font-weight: bold;">Total</i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($buy->currency == '2.50'):
                    ?>
                        <tr class="border-bottom">
                            <td>Création du FTP</td>
                            <td class="text-center">250 mo FTP</td>
                            <td class="text-center">1.50 €</td>
                            <td class="text-center">1,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>Sous-domaine</td>
                            <td class="text-center">1</td>
                            <td class="text-center">0,50 €</td>
                            <td class="text-center">0,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>MySQL</td>
                            <td class="text-center">50 mo</td>
                            <td class="text-center">0,00 €</td>
                            <td class="text-center">0,00 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>E-mail</td>
                            <td class="text-center">1</td>
                            <td class="text-center">0,50 €</td>
                            <td class="text-center">0,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>Sauvegarde</td>
                            <td class="text-center">Aucun</td>
                            <td class="text-center">0,00 €</td>
                            <td class="text-center">0,00 €</td>
                        </tr>
                    <?php
                    endif;
                    if ($buy->currency == '6'):
                    ?>
                        <tr class="border-bottom">
                            <td>Création du FTP</td>
                            <td class="text-center">500 mo FTP</td>
                            <td class="text-center">2,5 €</td>
                            <td class="text-center">2,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>Sous-domaine</td>
                            <td class="text-center">2</td>
                            <td class="text-center">0,50 €</td>
                            <td class="text-center">1,00 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>MySQL</td>
                            <td class="text-center">100 mo</td>
                            <td class="text-center">0,50 €</td>
                            <td class="text-center">0,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>E-mail</td>
                            <td class="text-center">3</td>
                            <td class="text-center">0,50 €</td>
                            <td class="text-center">1,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>Sauvegarde</td>
                            <td class="text-center">Mensuel</td>
                            <td class="text-center">0,50 €</td>
                            <td class="text-center">0,50 €</td>
                        </tr>
                    <?php
                    endif;
                   if ($buy->currency == '22.50'):
                    ?>
                        <tr class="border-bottom">
                            <td>Création du FTP</td>
                            <td class="text-center">1024 mo FTP</td>
                            <td class="text-center">12.50 €</td>
                            <td class="text-center">12,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>Sous-domaine</td>
                            <td class="text-center">3</td>
                            <td class="text-center">0,50 €</td>
                            <td class="text-center">1,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>MySQL</td>
                            <td class="text-center">250 mo</td>
                            <td class="text-center">2,50 €</td>
                            <td class="text-center">2,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>E-mail</td>
                            <td class="text-center">5</td>
                            <td class="text-center">0,50 €</td>
                            <td class="text-center">2,50 €</td>
                        </tr>
                        <tr class="border-bottom">
                            <td>Sauvegarde</td>
                            <td class="text-center">journalièr</td>
                            <td class="text-center">3,50 €</td>
                            <td class="text-center">3,50 €</td>
                        </tr>
                    <?php
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-7 col-sm-8 text-end">
                <p class="mb-1">Total HT :</p>
                <p class="mb-1">TVA (<?= $data->tva; ?>%) :</p>
                <h5 class="fw-bold mt-2 text-primary">Total TTC :</h5>
            </div>
            <div class="col-5 col-sm-2 text-end">
                <?php
                    if ($buy->currency == '2.50'):
                    ?>
                    <p class="mb-1">2,50 €</p>
                    <p class="mb-1">0,00 €</p>
                    <h5 class="fw-bold mt-2 text-primary">2,50 €</h5>
                    <?php
                    endif;
                ?>
                <?php
                    if ($buy->currency == '6'):
                    ?>
                    <p class="mb-1">6,00 €</p>
                    <p class="mb-1">0,00 €</p>
                    <h5 class="fw-bold mt-2 text-primary">6,00 €</h5>
                    <?php
                    endif;
                ?>
                <?php
                    if ($buy->currency == '22.50'):
                    ?>
                    <p class="mb-1">22,50 €</p>
                    <p class="mb-1">0,00 €</p>
                    <h5 class="fw-bold mt-2 text-primary">22,50 €</h5>
                    <?php
                    endif;
                ?>
            </div>
        </div>
        <div class="mt-5 pt-4 border-top">
            <div class="row">
                <div class="col-sm-8">
                    <p class="small text-muted mb-0"><strong>Note :</strong> Merci pour votre confiance.<br>Paiement attendu sous <b>7 jours</b>.</p>
                </div>
                <div class="col-sm-4 text-sm-end">
                    <p class="small text-muted mb-0">IBAN: <b><?= $data->iban; ?></b><br>Code BIC/SWIFT : <b><?= $data->BIC; ?></b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card invoice-card mt-4 p-4 p-md-5">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="text-primary mb-1"><?= $data->enterprise; ?></h2>
                <p class="text-muted"><?= $data->adress; ?><br><?= $data->mail; ?><br><?= $data->siret; ?></p>
            </div>
            <div class="col-sm-6 text-sm-end">
                <h4 class="text-uppercase fw-bold">Facture</h4>
                <p class="mb-0">Référence : <i style="font-weight: bold !important;"><?= $buy->unique_key; ?></i></p>
                <p>Date : <i style="font-weight: bold !important;"><?= Common::TransformDate($buy->dateinsert, 'FULL', 'MEDIUM'); ?></i></p>
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            <table class="table table-borderless">
                <thead class="border-bottom">
                    <tr><th><i style="font-weight: bold;color:brown;">Interdit</i><br></th></tr></thead><tbody><td><?= $data->rules_neg ?></td></tbody></table>
            <table class="table table-borderless"><thead class="border-bottom"><tr><th><i style="font-weight: bold;color:#006400;">Autorisations</i><br></th></tr></thead><tbody><td><?= $data->rule_pos; ?></td></tbody></table>
        </div>
        <!-- Footer -->
        <div class="mt-5 pt-4 border-top">
            <div class="row">
                <div class="col-sm-12">
                    <p class="small text-muted mb-0"><strong>Merci pour votre confiance.</strong></p>
                </div>
            </div>
        </div>
    </div>

        <?php
        Notification::error('Nous conservons votre nom et votre adresse IP dans notre base de données.<br>Vous pouvez a tout moment demander la suppression de celui-ci, si un sous-domaine et ratacher, il sera detruit, mais je garde un backup 1 mois au cas ou.<br><i style="color:red;">Garder bien le numéro de commande de 16 caractères : <strong style="color:green;font-weight: bold;">'.$buy->unique_key.'</strong></i>', 'Information');
        if ($buy->currency == '2.50'):
            echo '<div class="belcms_buy_button"><a target="_blank" href="https://www.paypal.com/ncp/payment/9ACY87U2MN9QG"><img src="pages/buyplan/pay_logo.png"></a></div>';
        elseif ($buy->currency == '6'):
         echo '<div class="belcms_buy_button"><a target="_blank" href="https://www.paypal.com/ncp/payment/VU843MZ8PS7RC"><img src="pages/buyplan/pay_logo.png"></a></div>';
        elseif ($buy->currency == '22.50'):
            echo '<div class="belcms_buy_button"><a target="_blank" href="https://www.paypal.com/ncp/payment/NBSFW3MC3BJ2A"><img src="pages/buyplan/pay_logo.png"></a></div>';
        endif;
        ?>
    
    <div class="card invoice-card mt-4 p-4 p-md-5">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="text-primary mb-1"><?= $data->enterprise; ?></h2>
                <p class="text-muted"><?= $data->adress; ?><br><?= $data->mail; ?><br><?= $data->siret; ?></p>
            </div>
            <div class="col-sm-6 text-sm-end">
                <h4 class="text-uppercase fw-bold">Information</h4>
                <p class="mb-0">Référence : <i style="font-weight: bold !important;"><?= $buy->unique_key; ?></i></p>
                <p>Date : <i style="font-weight: bold !important;"><?= Common::TransformDate($buy->dateinsert, 'FULL', 'MEDIUM'); ?></i></p>
            </div>
        </div>
        <hr>
        <div class="">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="border-bottom">
                            <th colspan="2"><i style="font-weight: bold;">Description</i></th>
                        </thead>
                        <tbody>
                            <?php
                            if ($buy->currency == '2.50'):
                            ?>
                            <tr>
                                <td style="font-weight: bold;" class="text-end">FTP :</td>
                                <td><?=  $buy->currency; ?> mo</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;" class="text-end">Nom de domaine 1 :</td>
                                <td><?= $buy->website_1; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;" class="text-end">E-mail @</td>
                                <td><?= $buy->emailbelcms_1; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;" colspan="2">
                                    <div id="belcms_buy_comment">
                                        <?= $buy->comment ?>
                                    </div>
                                </td>
                            </tr>
                            <th colspan="2"><div id="belcms_buy_unic"><?= $buy->unique_key; ?></div></th>
                            <?php
                            endif;
                            ?>
                        </tbody>
                    </table>
                    <div id="belcms_buy_mail">
                        <?php 
                        Notification::warning('
                            <a href="https://webmail.determe.be/" title="Lien email"><strong style="font-weight: bold">Lien pour la boite e-mail</strong></a><br><br>
                            <a href="https://phpmyadmin.determe.be/" title="Lien phpMyAdmin"><strong style="font-weight: bold">Lien pour phpMyAdmin</strong></a><br>
                        ');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <th><i style="font-weight: bold;">Nom</i></th>
                    <th></th>
                    <th><i style="font-weight: bold;">Valeur</i></th>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 49%;text-align:right;">1er e-mail</td>
                        <td style="width: 2%; text-align:center;">:</td>
                        <td style="width: 49%;text-align:left;"><i style="font-weight: bold;"><?= $buy->emailbelcms_1; ?></i></td>
                    </tr>
                    <?php
                    if (!empty($buy->emailbelcms_2)) {
                        echo '<tr>
                            <td style="width: 49%;text-align: right;">2ème e-mail</td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td style="width: 49%;text-align: left;"><i style="font-weight: bold;">'.$buy->emailbelcms_2.'</i></td>
                        </tr>';
                    }
                    if (!empty($buy->emailbelcms_3)) {
                        echo '<tr>
                            <td style="width: 49%;text-align: right;">2ème e-mail</td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td style="width: 49%;text-align:left;"><i style="font-weight: bold;">'.$buy->emailbelcms_3.'</i></td>
                        </tr>';
                    }
                    if (!empty($buy->emailbelcms_4)) {
                        echo '<tr>
                            <td style="width: 49%;text-align: right;">4ème e-mail</td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td style="width: 49%;text-align:left;"><i style="font-weight: bold;">'.$buy->emailbelcms_4.'</i></td>
                        </tr>';
                    }
                    if (!empty($buy->emailbelcms_5)) {
                        echo '<tr>
                            <td style="width: 49%;text-align: right;">5ème e-mail</td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td style="width: 49%;text-align:left;"><i style="font-weight: bold;">'.$buy->emailbelcms_5.'</i></td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead class="border-bottom">
                    <th><i style="font-weight: bold;">Nom</i></th>
                    <th></th>
                    <th><i style="font-weight: bold;">Valeur</i></th>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 49%;text-align: right;">Sous-domaine 1</td>
                        <td style="width: 2%; text-align: center;">:</td>
                        <td style="width: 49%;text-align:left;"><i style="font-weight: bold;"><?= $buy->website_1; ?></i></td>
                    </tr>
                    <?php
                    if (!empty($buy->website_2)) {
                        echo '<tr>
                        <td style="width: 49%;text-align: right;">Sous-domaine 2</td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td style="width: 50%;text-align:left;"><i style="font-weight: bold;">'.$buy->website_2.'</i></td>
                        </tr>';
                    }
                    if (!empty($buy->website_3)) {
                        echo '<tr>
                        <td style="width: 49%;text-align: right;">Sous-domaine 3</td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td style="width: 50%;text-align:left;"><i style="font-weight: bold;">'.$buy->website_3.'</i></td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        if (!empty($buy->comment)) {
            Notification::warning($buy->comment);
        }
        ?>
    </div>
</div>