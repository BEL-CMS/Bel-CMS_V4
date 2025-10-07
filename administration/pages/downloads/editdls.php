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

use BelCMS\Core\groups;
?>
<form action="Downloads/editnew?management&option=pages" method="post" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Editer un téléchargement
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input value="<?= $data->name ?>" name="name" required="required" type="text" class="form-control" id="name" placeholder="Titre du téléchargement">
                            <label for="name">Nom</label>
                        </div>
                        <div class="mb-3">
                            <select name="idcat" class="form-control">
                                <nom>Une catégorie</nom>
                                <libellé>choisissez une catégorie</libellé>
                                <choix>
                                <obligatoire minimum="1" maximum="1">
                                    <?php
                                    foreach ($cat as $key => $value):
                                    ?>
                                        <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="description"><?= $data->description; ?></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Fichier</span>
                            <span class="input-group-text"><?= ini_get(option: 'upload_max_filesize'); ?> max</span>
                            <input type="file" name="download" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" readonly disabled class="form-control" value=" <?= $data->download; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Lien du téléchargement</span>
                            <input type="text" name="link" class="form-control" placeholder="http://">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Fichier torrent</span>
                            <span class="input-group-text"><?= ini_get(option: 'upload_max_filesize'); ?> max</span>
                            <input type="file" name="torrent" accept=".torrent" class=" form-control" id="inputGroupFile02">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" readonly disabled class="form-control" value=" <?= $data->torrent; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Image</span>
                            <span class="input-group-text"><?= ini_get(option: 'upload_max_filesize'); ?> max</span>
                            <input type="file" accept="image/*" name="screen" class="form-control" id="inputGroupFile01">
                        </div>
                        <?php
                        if (!empty($data->screen)):
                        ?>
                            <div class="mb-3">
                                <img style="max-width:150px;margin: 50px;" src="<?= $data->screen; ?>">
                            </div>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="card custom-card mt-3">
                        <div class="card-header justify-content-between">
                            <div class="card-title">Autorisation de l'accès</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="mb-3">
                                <?php
                                if (empty($data->groups_access)) {
                                    $data->groups_access = '0';
                                }
                                $arrayAccess = explode("|", $data->groups_access);
                                $groups = groups::getGroups();
                                $groups[] = (object) array('id_group' => 0, 'name' => 'VISITOR');
                                foreach ($groups as $key => $value):
                                    $name = defined($value->name) ? constant($value->name) : $value->name;
                                    if ($value->name != 'ADMINISTRATOR'):
                                        $checked = (in_array($value->id_group, $arrayAccess)) ? "checked" : '';
                                ?>
                                        <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                            <input value="<?= $value->id_group; ?>" name="groups_access[]" id="toggleswitchLight_<?= $value->id_group; ?>" type="checkbox" <?= $checked; ?>>
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
                    <div class="card-footer">
                        <div class="mb-3">
                            <input name="id" type="hidden" value="<?= $data->id; ?>">
                            <button type="submit" class="btn btn-warning-gradient btn-wave">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>