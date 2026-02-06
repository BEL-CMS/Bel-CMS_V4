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

use BelCMS\Core\BelCMS;
use BelCMS\Core\config;
use BelCMS\Core\Groups;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form action="news/sendParameter?management&option=pages" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-4 col-sm-6">
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="card-header border-bottom border-block-end-dashed">
                        <div class="card-title">Actualités</div>
                    </div>
                    <div class="card-body">
                        <div class="custom-toggle-switch d-flex align-items-center mb-4">
                            <input id="toggleswitchSuccess" name="active" type="checkbox" value="1">
                            <label for="toggleswitchSuccess" class="label-success"></label><span class="ms-3">Activer la page article</span><br>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <label for="input-number" class="form-label">Nombre de blog</label>
                            <input min="1" max="8" type="number" name="MAX_NEWS" value="1" class="form-control" id="input-number" placeholder="Number">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn icon-btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6">
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="card-header border-bottom border-block-end-dashed">
                        <div class="card-title">Groupes qui va administrer les articles</div>
                    </div>
                    <div class="card-body">
                        <?php
                        foreach (config::listGroups() as $key => $value):
                            $value->name = defined(strtoupper($value->name)) ? constant(strtoupper($value->name)) : $value->name;
                            $checked = $value->id_group == '1' ? 'checked onclick="return false;"' : '';
                            $ver = $value->id_group == '1' ? '<i style="color:red;">Verrouillé</i>' : '';
                        ?>
                            <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                <input id="<?= 'admin' . $key; ?>" name="admin[]" type="checkbox" value="<?= $value->id_group; ?>" <?= $checked; ?>>
                                <label for="<?= 'admin' . $key; ?>" class="label-dark"></label><span class="ms-3">Activer <?= $value->name; ?> <?= $ver; ?></span><br>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6">
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="card-header border-bottom border-block-end-dashed">
                        <div class="card-title">Groupes qui va avoir accès aux articles</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <?php
                            foreach (config::listGroups() as $key => $value):
                                if ($value->id_group != 1):
                                    $value->name = defined(strtoupper($value->name)) ? constant(strtoupper($value->name)) : $value->name;
                            ?>
                                    <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                        <input id="<?= 'grp' . $key; ?>" name="groups[]" type="checkbox" value="<?= $value->id_group; ?>">
                                        <label for="<?= 'grp' . $key; ?>" class="label-info"></label><span class="ms-3">Activer <?= $value->name; ?></span>
                                    </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                            <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                <input id="<?= 'grp' . 0; ?>" name="groups[]" type="checkbox" value="0">
                                <label for="<?= 'grp' . 0; ?>" class="label-success"></label><span class="ms-3">Activer Visiteur</span><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>