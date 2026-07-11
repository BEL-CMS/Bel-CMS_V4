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

use BelCMS\Core\GetHost;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

?>
<div class="col-12">
    <div class="card shadow-sm mb-3">
        <div class="card-header bg-white d-flex">
            <h2 class="h5 mb-0"><i class="fa-regular fa-address-card"></i> Informations générales</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">e-mail</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->mail_user; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Nom d'utilisateur</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= User::getNameForMail($web->mail_user); ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">IP</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->ip; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Clé unique de payement</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->unique_key; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Date de création</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= Common::TransformDate($web->dateinsert, 'FULL', 'MEDIUM'); ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card shadow-sm mb-3">
        <div class="card-header bg-white d-flex">
            <h2 class="h5 mb-0"><i class="fa-brands fa-internet-explorer"></i> Informations hébérgements</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Plan</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->plan; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Payement</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->currency; ?> €</td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Version de PHP</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->phpversion; ?></td>
                </tr>
                <?php
                if (!empty($web->comment)):
                ?>
                <tr>
                    <td colspan="3"><div class="belcms_textarea"><?= $web->comment; ?></div></td>
                </tr>
                <?php
                endif;
                if (!empty($web->file)):
                ?>
                <tr><td colspan="3"><a href="<?= GetHost::getBaseUrl().$web->file; ?>"><?= GetHost::getBaseUrl().$web->file; ?></a></td></tr>
                <?php
                endif;
                ?>
            </table>
        </div>
    </div>
    <div class="card shadow-sm mb-3">
        <div class="card-header bg-white d-flex">
            <h2 class="h5 mb-0"><i class="fa-solid fa-envelopes-bulk"></i>  Informations des e-mails</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Mail 1 demander</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->emailbelcms_1; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Mail 2 demander</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->emailbelcms_2; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Mail 3 demander</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->emailbelcms_3; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Mail 4 demander</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->emailbelcms_4; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Mail 5 demander</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->emailbelcms_5; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card shadow-sm mb-3">
        <div class="card-header bg-white d-flex">
            <h2 class="h5 mb-0"><i class="fa-brands fa-creative-commons"></i>  Informations des sous-domaines</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Sous-domaine demander : 1</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->website_1; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Sous-domaine demander : 2</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->website_2; ?></td>
                </tr>
                <tr>
                    <td style="width:49%;text-align:right; font-weight: bold;">Sous-domaine demander : 3</td>
                    <td style="width: 1%;text-align:center;">:</td>
                    <td style="width:49%;text-align:left"><?= $web->website_3; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>