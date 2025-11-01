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

use BelCMS\Requires\Common;
use BelCMS\Core\groups;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header">
                    <div class="card-title">
                        Ajouter un téléchargement
                    </div>
                </div>
                <form action="Downloads/sendnew?management&option=pages" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input name="name" required="required" type="text" class="form-control" id="name" placeholder="Titre du téléchargement">
                            <label for="name">Nom</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Fichier</span>
                            <span class="input-group-text"><?= ini_get(option: 'upload_max_filesize'); ?> max</span>
                            <input type="file" name="download" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Lien du téléchargement</span>
                            <input type="text" name="link" class="form-control" placeholder="http://">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Fichier torrent</span>
                            <input type="file" accept=".torrent" name="torrent" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Taille en bit * si vous envoyer par le FTP. **pas obligatoire</span>
                            <input type="number" min="0" name="size" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select name="idcat" class="form-control">
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
                            <textarea class="bel_cms_textarea_full" name="description"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Image</span>
                            <span class="input-group-text"><?= ini_get(option: 'upload_max_filesize'); ?> max</span>
                            <input type="file" accept="image/*" name="screen" class="form-control">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="mb-3">
                                <?php
                                $groups = groups::getGroups();
                                $groups[] = (object) array('id_group' => 0, 'name' => 'VISITOR');
                                foreach ($groups as $key => $value):
                                    $name = defined($value->name) ? constant($value->name) : $value->name;
                                    if ($value->name != 'ADMINISTRATOR'):
                                ?>
                                        <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                            <input value="<?= $value->id_group; ?>" name="groups_access[]" id="toggleswitchLight_<?= $value->id_group; ?>" type="checkbox">
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
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>