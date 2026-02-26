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
<div class="row">
    <div class="col-xl-6">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">Information du contact</div>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Le nom :</label>
                    <div class="col-sm-9">
                        <input disabled type="email" class="form-control" value="<?= $mails->user; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">E-mail :</label>
                    <div class="col-sm-9">
                        <input disabled type="email" class="form-control" value="<?= $mails->mail_user; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Catégorie :</label>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control" value="<?= $mails->category; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Objet : </label>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control" value="<?= $mails->object; ?>">
                    </div>
                </div>
                <div class="mb-3 row p-3">
                    <pre style="
                        box-sizing: border-box;
                        width: 100%;
                        padding: 0;
                        margin: 0;
                        overflow: auto;
                        overflow-y: hidden;
                        font-size: 12px;
                        line-height: 20px;
                        background: #f5f5f5;
                        border: var(--pe-border-width) solid var(--pe-border-color);
                        border-radius: 4px;
                        padding: 10px;
                        color: #000;">
                        <?= $mails->message; ?>
                    </pre>
                </div>
            </div>
        </div>
    </div>
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"><?= constant('REPLY_MSG'); ?></div>
                </div>
                <div class="card-body">
                    <form action="contact/sendreply?management&option=pages" method="post" class="mb-3">
                        <textarea style="width: 625px !important;margin:auto;" class="bel_cms_textarea_full" name="content">
                            <table align="center" style="background-color: #f5f5f5; width: 600px;" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                <td align="center">
                                <table class="container" style="background-color: #f5f5f5; padding: 20px; font-family: Arial, sans-serif; border-radius: 8px;" width="600" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                <td style="text-align: center;" align="center">
                                <h1><strong>Réponse à votre message</strong></h1>
                                </td>
                                </tr>
                                <tr style="height: 72px;">
                                <td style="color: #333333; font-size: 16px; line-height: 1.5; height: 72px; width: 516px;">Bonjour,<br /><br /><br /></td>
                                </tr>
                                <tr style="height: 15px;">
                                <td style="padding-top: 30px; font-size: 12px; color: #999999; height: 15px; width: 516px;" align="center"><a href="https://bel-cms.dev">copyright : Bel-CMS</a></td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                            </table>
                        </textarea>
                    </form>
                    <div class="mb-3 row p-3">
                        <input type="hidden" name="id" value="<?= $mails->id; ?>">
                        <button type="submit" class="btn btn-primary"><?= constant('REPLY') ?></button>
                    </div>
                </div>
            </div>
        </div>
</div>