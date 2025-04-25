<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
 */

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\Requires\Common;

$datas = array();

foreach ($data as $key => $value) {
    $datas[$value->name] = $value->value;
}
$dateInstall = Common::TransformDate($datas['CMS_DATE_INSTALL'], 'FULL', 'SHORT');
$checked1 = $datas['CMS_JQUERY']     == '1' ? 'checked="checked"' : '';
$checked2 = $datas['CMS_BOOTSTRAP']  == '1' ? 'checked="checked"' : '';
$checked3 = $datas['CMS_FONTAWSOME'] == '1' ? 'checked="checked"' : '';
$checked4 = $datas['CMS_HIGHLIGHT']  == '1' ? 'checked="checked"' : '';
$mail     = !empty($datas['CMS_MAIL'])       ?  $datas['CMS_MAIL']  : $_SERVER['SERVER_ADMIN'];
$valid    = empty($datas['CMS_VALIDATION_TIME']) ? 1 : $datas['CMS_VALIDATION_TIME'];
?>
<form action="prefgen/sendParameter?management&option=parameter" method="post">
    <div class="row">
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header justify-content-between">
                    <div class="card-title">Paramètres Général</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <span class="input-group-text">Titre du site</span>
                            <input type="text" name="CMS_NAME" class="form-control" value="<?= $datas['CMS_NAME']; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Description du site</span>
                            <input type="text" name="CMS_DESCRIPTION" class="form-control" value="<?= $datas['CMS_DESCRIPTION']; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Mot-clés</span>
                            <input type="text" name="CMS_KEYWORDS" class="form-control" value="<?= $datas['CMS_KEYWORDS']; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Charte d'enregistrement</span>
                            <textarea name="CMS_CHARTE" class="form-control"><?= $datas['CMS_CHARTE']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Email du site</span>
                            <input type="text" name="CMS_MAIL" class="form-control" placeholder="<?= $mail; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Durée du Captcha en seconde * 1s à 240 sec</span>
                            <input type="number" pattern="\d+" required name="CMS_VALIDATION_TIME" value="<?= $datas['CMS_VALIDATION_TIME'] ?>" placeholder="Durée des cookies" min="1" max="240" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" disabled>
                                <option selected>Fr</option>
                                <option>Eng</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="card-header">
                        <div class="card-title">Sauvegarder les paramètres</div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-success label-btn label-end">Sauvegarder les changements<i class="ri-thumb-up-line label-btn-icon ms-2"></i></button>
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
                    <div class="card-title">Paramètre d'indication</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <span class="input-group-text">Date d'installation</span>
                            <input type="text" class="form-control" value="<?= $dateInstall; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Langue de votre site</span>
                            <input type="text" class="form-control" value="<?= $datas['CMS_LANG']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Version du C.M.S</span>
                            <input type="text" class="form-control" value="<?= $datas['CMS_VERSION']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text">Template</span>
                            <input type="text" class="form-control" value="<?= $datas['CMS_TEMPLATE']; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header justify-content-between">
                    <div class="card-title">Paramètre de clé CMS</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <blockquote class="blockquote custom-blockquote danger mb-0 text-center">
                                <h6>Clé API</h6>
                                <div class="alert alert-danger border border-danger mb-0 p-2">
                                    <div class="d-flex align-items-start">
                                        <div class="me-2 svg-danger">
                                        </div>
                                        <div class="text-danger w-100">
                                            <div class="fw-medium d-flex justify-content-between">Alert API<button type="button" class="btn-close p-0" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>
                                            <div class="fs-12 op-8 mb-1">À changer si vraiment, il y a besoin<br>
                                                Tous les comptes devront se devront être recréé, ID sert à coder tout le site pour les informations important.
                                            </div>
                                            <input type="text" class="form-control" name="CMS_KEY_ADMIN" value="<?= $datas['CMS_KEY_ADMIN']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header justify-content-between">
                    <div class="card-title">Activation des plugins C.M.S</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div>
                            <div class="custom-toggle-switch d-flex align-items-center mb-2">
                                <input id="ActiverjQuery" <?= $checked1; ?> name="CMS_JQUERY" type="checkbox">
                                <label for="ActiverjQuery" class="label-success"></label><span class="ms-3">Activer jQuery 3.7</span>
                            </div>
                        </div>
                        <div>
                            <div class="custom-toggle-switch d-flex align-items-center mb-2">
                                <input id="Activerhighlight" <?= $checked4; ?> name="CMS_HIGHLIGHT" type="checkbox">
                                <label for="Activerhighlight" class="label-success"></label><span class="ms-3">Activer highlight</span>
                            </div>
                        </div>
                        <div>
                            <div class="custom-toggle-switch d-flex align-items-center mb-2">
                                <input id="ActiverhFontAwsome" <?= $checked3; ?> name="CMS_FONTAWSOME" type="checkbox">
                                <label for="ActiverhFontAwsome" class="label-success"></label><span class="ms-3">Activer FontAwsome 63.7.2</span>
                            </div>
                        </div>
                        <div>
                            <div class="custom-toggle-switch d-flex align-items-center mb-2">
                                <input id="Activerhbotstrap" <?= $checked2; ?> name="CMS_BOOTSTRAP" type="checkbox">
                                <label for="Activerhbotstrap" class="label-success"></label><span class="ms-3">Activer Boostrap 5.3.3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>