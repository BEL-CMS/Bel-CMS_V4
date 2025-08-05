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
                        Créer une catégorie additionnelle
                    </div>
                </div>
                <form action="gallery/sendnewcat?management&option=pages" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input name="name" required="required" type="text" class="form-control" id="name">
                            <label for="name">Nom</label>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Description</span>
                                <textarea name="description" class="form-control" spellcheck="true" maxlength="100"></textarea>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label class="form-label">Couleur d'affichage</label>
                            <input class="form-control form-input-color" type="color" name="color">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="input-file" class="form-label">Image de fond</label>
                            <input class="form-control" name="background" type="file" id="input-file" accept="image/*, webp">
                        </div>
                        <?php
                        foreach ($groups as $key => $value) {
                            $name[$value->id_group] = defined($value->name) ? constant($value->name) : $value->name;
                        }
                        foreach ($name as $key => $value):
                            if ($key == 1):
                        ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <div class="form-check form-switch">
                                    <input name="access[]" checked disabled class="form-check-input form-checked-danger" type="checkbox" role="switch" id="<?= $value; ?>" value="<?= $key; ?>"> <label class="form-check-label" for="<?= $value; ?>"><?= $value; ?>
                                </div>
                            </div>
                            <?php
                            else:
                            ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <div class="form-check form-switch">
                                    <input name="access[]" class="form-check-input form-checked-success" type="checkbox" role="switch" id="<?= $value; ?>" value="<?= $key; ?>"> <label class="form-check-label" for="<?= $value; ?>"><?= $value; ?>
                                </div>
                            </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <div class="form-check form-switch">
                                <input name="access[]" class="form-check-input form-checked-warning" type="checkbox" role="switch" id="<?= $value; ?>" value="0"> <label class="form-check-label" for="visitor"><?php echo defined(strtoupper('VISITORS')) ? constant('VISITORS') : 'Visiteurs'; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>