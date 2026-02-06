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
                        Liste des groupes
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th scope="col">ID Groupe</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Couleur</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($groups as $key => $value):
                                    $name = defined(strtoupper($value->name)) ? constant(strtoupper($value->name)) : ucfirst($value->name);
                                    if (!empty($value->image)) {
                                        $img  = is_file($value->image) ? $value->image : 'administration/users/groups/no_img.jpg';
                                    } else {
                                        $img = 'administration/users/groups/no_img.jpg';
                                    }
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?= $value->id_group;?>
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                            </span><?=$name;?>
                                        </div>
                                    </td>
                                    <td style="background-color:<?=$value->color;?>;">Couleur</td>
                                    <td><?= $value->description;?></td>
                                    <td>
                                        <a type="button" class="btn btn-secondary-gradient rounded-pill btn-wave" onclick='location.href="groups/edit/<?=$value->id;?>?admin&option=users"'><i class="fa-solid fa-pen-to-square align-middle me-2 d-inline-block"></i>Edition</a>
                                        <?php
                                        if ($value->id_group != 1) {
                                            if ($value->id_group != 2) {
                                        ?>
                                        <a href="groups/delete/<?=$value->id;?>?admin&option=users" class="btn btn-danger rounded-pill btn-wave">
                                            <i class="ri-delete-bin-line align-middle me-2 d-inline-block"></i>Delete
                                        </a>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
