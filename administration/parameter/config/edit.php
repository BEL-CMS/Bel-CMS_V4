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

use BelCMS\Core\Config;
use BelCMS\Core\groups;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
//debug(Config::GetConfigPage($data->name));
$checked = Config::GetConfigPage($data->name)->active == 1 ? 'checked' : "";
?>
<form action="config/sendParameter?management&option=parameter" method="post">
    <div class="row">
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Paramètres Général</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                <input id="toggleswitchLight" name="active" type="checkbox" <?= $checked; ?>>
                                <label for="toggleswitchLight" class="label-warning"></label>
                                <span class="ms-3">Activer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Autorisation de l'accès</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <?php
                            $arrayAccess = explode("|", $data->access_groups);
                            $groups = groups::getGroups();
                            $groups[] = (object) array('id_group' => 0, 'name' => 'VISITOR');
                            foreach ($groups as $key => $value):
                                $name = defined($value->name) ? constant($value->name) : $value->name;
                                if ($value->name != 'ADMINISTRATOR'):
                                    $checked = (in_array($value->id_group, $arrayAccess)) ? "checked" : '';
                            ?>
                                    <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                        <input value="<?= $value->id_group; ?>" name="access_groups[]" id="toggleswitchLight_<?= $value->id_group; ?>" type="checkbox" <?= $checked; ?>>
                                        <label for="toggleswitchLight_<?= $value->id_group; ?>" class="label-warning"></label>
                                        <span class="ms-3">Activer <?= $name; ?></span>
                                    </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Autorisation administration</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <?php
                            $arrayAccess = explode("|", $data->access_admin);
                            $groups = groups::getGroups();
                            foreach ($groups as $key => $value):
                                $name = defined($value->name) ? constant($value->name) : $value->name;
                                if ($value->name != 'ADMINISTRATOR'):
                                    $checked = (in_array($value->id_group, $arrayAccess)) ? "checked" : '';
                            ?>
                                    <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                        <input value="<?= $value->id_group; ?>" name="access_admin[]" id="toggleswitchLight_b<?= $value->id_group; ?>" type="checkbox" <?= $checked; ?>>
                                        <label for="toggleswitchLight_b<?= $value->id_group; ?>" class="label-warning"></label>
                                        <span class="ms-3">Activer <?= $name; ?></span>
                                    </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Paramètres supplèmentaires</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <label>Plusieurs options séparées par un | ( exemple : OPTION1=5|OPTION2=1 )</label>
                        <input class="form-control" type="text" value="<?= $data->config; ?>" name="config" placeholder="Plusieurs options séparées par un |">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-orange">Enregistrer</button>
        </div>
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Description SEO</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <input id="description" value="<?= $data->description; ?>" class="form-control" type="text" name="description" placeholder="Breve description de la page">
                        </div>
                        <div class="mb-3">
                            <label for="key">Mot clé</label>
                            <input id="key" value="<?= $data->key_seo; ?>" class="form-control" type="text" name="key_seo" placeholder="Mot clé de la page">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Information supplèmentaire</div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="infos_sup"><?= $data->infos_sup; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?= $data->name; ?>" name="name">
    <input type="hidden" value="<?= $data->id; ?>" name="id">
</form>