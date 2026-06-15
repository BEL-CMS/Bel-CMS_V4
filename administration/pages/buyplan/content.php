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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="row mb-3">
    <div class="col-xl-6">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">Informations générales</div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">e-mail</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->mail_user; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Nom d'utilisateur</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= User::getNameForMail($content->mail_user); ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">IP</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->ip; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Clé unique de payement</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->unique_key; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Date de création</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= Common::TransformDate($content->dateinsert, 'FULL', 'MEDIUM'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">Informations des sous-domaines</div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Sous-domaine demander : 1</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->website_1; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Sous-domaine demander : 2</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->website_2; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Sous-domaine demander : 3</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->website_3; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">Informations hébérgements</div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Plan</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->plan; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Payement</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->currency; ?> €</td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Version de PHP</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->phpversion; ?></td>
                    </tr>
                    <?php
                    if (!empty($content->comment)):
                    ?>
                    <tr>
                        <td colspan="3" style="background-color: #212529;color: #fff">Commentaire : <br><?= $content->comment; ?></td>
                    </tr>
                    <?php
                    endif;
                    if (!empty($content->file)):
                    ?>
                    <tr><td colspan="3"><?= $content->file; ?></td></tr>
                    <?php
                    endif;
                    ?>
                </table>
            </div>
        </div>
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">Informations des e-mails</div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Mail 1 demander</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->emailbelcms_1; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Mail 2 demander</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->emailbelcms_2; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Mail 3 demander</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->emailbelcms_3; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Mail 4 demander</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->emailbelcms_4; ?></td>
                    </tr>
                    <tr>
                        <td style="width:49%;text-align:right; font-weight: bold;">Mail 5 demander</td>
                        <td style="width: 1%;text-align:center;">:</td>
                        <td style="width:49%;text-align:left"><?= $content->emailbelcms_5; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<form action="buyplan/addplan?admin&option=pages" method="post" enctype="multipart/form-data">
<?php
if ($content->plan == 1) {
    echo '<input type="hidden" name="emailbelcms_1" value="'.$content->emailbelcms_1.'">';
    echo '<input type="hidden" name="website_1" value="'.$content->website_1.'">';
} elseif ($content->plan == 2) {
    echo '<input type="hidden" name="emailbelcms_1" value="'.$content->emailbelcms_1.'">';
    echo '<input type="hidden" name="emailbelcms_2" value="'.$content->emailbelcms_2.'">';
    echo '<input type="hidden" name="emailbelcms_3" value="'.$content->emailbelcms_3.'">';
    echo '<input type="hidden" name="website_1" value="'.$content->website_1.'">';
    echo '<input type="hidden" name="website_2" value="'.$content->website_2.'">';
} elseif ($content->plan == 3) {
    echo '<input type="hidden" name="emailbelcms_1" value="'.$content->emailbelcms_1.'">';
    echo '<input type="hidden" name="emailbelcms_2" value="'.$content->emailbelcms_2.'">';
    echo '<input type="hidden" name="emailbelcms_3" value="'.$content->emailbelcms_3.'">';
    echo '<input type="hidden" name="emailbelcms_4" value="'.$content->emailbelcms_4.'">';
    echo '<input type="hidden" name="emailbelcms_5" value="'.$content->emailbelcms_5.'">';
    echo '<input type="hidden" name="website_1" value="'.$content->website_1.'">';
    echo '<input type="hidden" name="website_2" value="'.$content->website_2.'">';
    echo '<input type="hidden" name="website_3" value="'.$content->website_3.'">';
}
?>
    <div class="d-grid gap-2">
        <input type="hidden" name="plan" value="<?= $content->plan; ?>">
        <input type="hidden" name="key" value="<?= $content->unique_key; ?>">
        <button type="submit" class="btn btn-info mb-3">Confirmer</button>
    </div>
</form>