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
?>
<form action="Forum/editCatMain?management&option=pages" method="post" enctype="multipart/form-data">
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
                            Editer la catégorie principal
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="cattitle" class="form-label">Nom de la catégorie principal</label>
                            <input id="cattitle" type="text" class="form-control" required name="title" value="<?= $data->title; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="catsubtitle" class="form-label">Sous-titre</label>
                            <input id="catsubtitle" type="text" class="form-control" name="subtitle" value="<?= $data->subtitle; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="caticon" class="form-label">Icon <span style="color:red;font-weight:bold;">* <a style="color:red;" href="https://fontawesome.com/search?ic=free" target="_blank">Voir ici</a></span></label>
                            <input id="caticon" type="text" class="form-control" name="icon" placeholder="fa-solid fa-house" value="<?= $data->icon; ?>">
                        </div>
                        <div class="mb-3">
                            <span class="mb-3">Activation de la catégorie</span>
                            <div class="custom-toggle-switch d-flex align-items-center mb-4 mt-3">
                                <?php
                                $chckd = $data->activate == 1 ? 'checked' : '';
                                ?>
                                <input value="1" <?= $chckd; ?> name="activate" id="toggleswitchLight" type="checkbox">
                                <label for="toggleswitchLight" class="label-warning"></label>
                                <span class="ms-3">Activer</span>
                             </div>
                        </div>
                        <div class="mb-3">
                            <span class="mb-3">Groupes qui ont accès</span>
                            <?php
                            $groups = groups::getGroups();
                            $groups[] = (object) array('id_group' => 0, 'name' => 'VISITOR');
                            $groups_access = explode('|',$data->access_groups);
                            foreach ($groups as $key => $value):
                                $name = defined($value->name) ? constant($value->name) : $value->name;
                                if ($value->name != 'ADMINISTRATOR'):
                                if (in_array($value->id_group, $groups_access)) {
                                    $groups_accessCheck = 'checked';
                                } else {
                                    $groups_accessCheck = '';
                                }
                            ?>
                                <div class="custom-toggle-switch d-flex align-items-center mb-4 mt-3">
                                    <input <?= $groups_accessCheck; ?> value="<?= $value->id_group; ?>" name="access_groups[]" id="toggleswitchLight_<?= $value->id_group; ?>" type="checkbox">
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
                            $access_admin = explode('|',$data->access_admin);
                            foreach ($groups as $key => $value):
                                $name = defined($value->name) ? constant($value->name) : $value->name;
                                if ($value->name != 'ADMINISTRATOR'):
                                if (in_array($value->id_group, $access_admin)) {
                                    $groups_admin_Check = 'checked';
                                } else {
                                    $groups_admin_Check = '';
                                }
                            ?>
                                <div class="custom-toggle-switch d-flex align-items-center mb-4 mt-3">
                                    <input <?= $groups_admin_Check; ?> value="<?= $value->id_group; ?>" name="access_admin[]" id="toggleswitchLight_admmin_<?= $value->id_group; ?>" type="checkbox">
                                    <label for="toggleswitchLight_admmin_<?= $value->id_group; ?>" class="label-warning"></label>
                                    <span class="ms-3">Activer <?= $name; ?></span>
                                </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                        <div class="mb-3">
                            <span>Ordre</span>
                            <input type="number" min="1" name="orderby" class="form-control" value="<?= $data->orderby; ?>">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" value="<?= $data->id; ?>" name="id">
                        <button type="submit" class="btn btn-secondary-gradient btn-wave">Sauvegarder</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>