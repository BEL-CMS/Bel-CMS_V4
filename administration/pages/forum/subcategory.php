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

use BelCMS\Core\groups;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form action="Forum/AddCatSec?management&option=pages" method="post" enctype="multipart/form-data">
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
                            Ajouter une catégorie principal
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Nom de la catégorie secondaire</label>
                            <input id="title" type="text" class="form-control" required name="title">
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Sous-titre</label>
                            <input id="subtitle" type="text" class="form-control" name="subtitle">
                        </div>   
                        <div class="mb-3">
                            <label for="forum" class="form-label">Catégorie principal</label>
                            <select class="form-control" name="id_forum">
                                <?php
                                foreach ($forum as $key => $value):
                                    echo '<option value="'. $value->id .'">'. $value->title .'</option>';
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <span class="mb-3">Groupes qui ont accès</span>
                            <?php
                            $groups = groups::getGroups();
                            $groups[] = (object) array('id_group' => 0, 'name' => 'VISITOR');
                            foreach ($groups as $key => $value):
                                $name = defined($value->name) ? constant($value->name) : $value->name;
                                if ($value->name != 'ADMINISTRATOR'):
                            ?>
                                <div class="custom-toggle-switch d-flex align-items-center mb-4 mt-3">
                                    <input value="<?= $value->id_group; ?>" name="access_groups[]" id="toggleswitchLight_<?= $value->id_group; ?>" type="checkbox">
                                    <label for="toggleswitchLight_<?= $value->id_group; ?>" class="label-warning"></label>
                                    <span class="ms-3">Activer <?= $name; ?></span>
                                </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                        <div class="mb-3">
                            <span class="mb-3">Groupes administrateur(s)</span>
                            <?php
                            $groups = groups::getGroups();
                            foreach ($groups as $key => $value):
                                $name = defined($value->name) ? constant($value->name) : $value->name;
                                if ($value->name != 'ADMINISTRATOR'):
                            ?>
                                <div class="custom-toggle-switch d-flex align-items-center mb-4 mt-3">
                                    <input value="<?= $value->id_group; ?>" name="access_admin[]" id="toggleswitchLight_admmin_<?= $value->id_group; ?>" type="checkbox">
                                    <label for="toggleswitchLight_admmin_<?= $value->id_group; ?>" class="label-warning"></label>
                                    <span class="ms-3">Activer <?= $name; ?></span>
                                </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                        <div class="mb-3">
                            <span class="mb-3">Catégorie Ouvert-Fermer</span>
                            <div class="custom-toggle-switch d-flex align-items-center mb-4 mt-3">
                                <input value="1" name="lock_forum" id="toggleswitchLight" type="checkbox">
                                <label for="toggleswitchLight" class="label-warning"></label>
                                <span class="ms-3">Ouvert</span>
                             </div>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon <span style="color:red;font-weight:bold;">* <a style="color:red;" href="https://fontawesome.com/search?ic=free" target="_blank">Voir ici</a></span></label>
                            <input id="icon" type="text" class="form-control" name="icon" placeholder="fa-solid fa-house">
                        </div>
                        <div class="mb-3">
                            <span>Ordre</span>
                            <input type="number" min="1" value="1" name="orderby" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-secondary-gradient btn-wave">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>