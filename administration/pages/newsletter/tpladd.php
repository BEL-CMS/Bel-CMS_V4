<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form action="newsletter/sendnewtpl?management&option=pages" method="post">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Nom du Template Newsletter</div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" required="required" type="text" class="form-control" name="name" placeholder="Nom du TPL">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header justify-content-between">
                    <div class="card-title">Template Design</div>
                </div>
                <div class="card-body" style="margin: auto;">
                    <div class="mb-3">
                        <textarea style="width: 625px !important;margin:auto;" class="bel_cms_textarea_full" name="content">
                            <table align="center" style="background-color: #f4f4f4; width: 600px;" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                <td align="center">
                                <table class="container" style="background-color: #ffffff; padding: 20px; font-family: Arial, sans-serif; border-radius: 8px;" width="600" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                <td style="text-align: center;" align="center">
                                <h1><strong>Titre</strong></h1>
                                </td>
                                </tr>
                                <tr style="height: 72px;">
                                <td style="color: #333333; font-size: 16px; line-height: 1.5; height: 72px; width: 516px;">Bonjour&nbsp; {user},<br /><br /><br /></td>
                                </tr>
                                <tr style="height: 15px;">
                                <td style="padding-top: 30px; font-size: 12px; color: #999999; height: 15px; width: 516px;" align="center"><a href="newsletter/unsubscribe">unsubscribe email</a></td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                            </table>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header justify-content-between">
                    <div class="card-title">Balises</div>
                </div>
                <div class="card-body">
                    <p>balise {user} pour afficher le nom d'utilisateur</p>
                    <p>balise {mail} pour afficher l'e-mail de l'utilisateur</p>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success mt-3">Sauvegarder les changements</button>
            </div>
        </div>
    </div>
</form>
</div>