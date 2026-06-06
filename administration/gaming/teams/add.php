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

use BelCMS\Requires\Common;

$upload_max = Common::size(Common::GetMaximumFileUploadSize());

?>
<form action="teams/addteam?admin&option=gaming" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12 col-xl-6 mt-3">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input name="name" required="required" type="text" class="form-control" id="name" placeholder="Entrer le nom de la team">
                        <label for="name">Nom de la team</label>
                    </div>
                     <div class="form-floating mb-3">
                        <input name="foundation" required="required" type="date" class="form-control" id="create">
                        <label for="create">Team Créé</label>
                    </div>
                     <div class="form-floating mb-3">
                        <input name="contact" type="url" class="form-control" id="contact" placeholder="https://example.com" pattern="https://.*" size="80" minlength="10" maxlength="80">
                        <label for="contact">Contact</label>
                    </div>
                    <div class="form-check form-switch form-switch-info mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="joining" checked="" name="joining">
                        <label class="form-check-label" for="joining">Team {ouvert-fermer}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="card card-h-100">
                <div class="card-header">
                    <h5 class="card-title">Logo</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning" role="alert"><i class="bi bi-info-circle-fill me-2"></i> Uploadez logo, touts les formats d'image acceptés  -  taille maximum: <strong>100*100px</strong> * taille maximum du logo <strong><?= $upload_max; ?></strong></div>
                    <div class="d-flex align-items-center flex-wrap gap-3 mb-3">
                        <div class="file-upload">
                            <button type="button" class="btn btn-primary" data-action="choose-file">
                                <?= constant('UPLOAD_LOGO'); ?>
                            </button>
                            <input class="file-upload-item" type="file" accept="image/*" data-action="file-input" required name="logo">
                        </div>
                    </div>
                    <div class="alert alert-warning" role="alert"><i class="bi bi-info-circle-fill me-2"></i> Uploadez une bannière, touts les formats d'image accepté  -  <strong>idéalement 16/9</strong>  * taille maximum de la bannière <strong><?= $upload_max; ?></strong></div>
                    <div class="d-flex align-items-center flex-wrap gap-3" data-uploader="">
                        <div class="file-upload">
                            <button type="button" class="btn btn-primary" data-action="choose-file">
                                <?= constant('UPLOAD_BANNIERE'); ?>
                            </button>
                            <input class="file-upload-item" type="file" accept="image/*" data-action="file-input" name="screen">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="mb-3">
                <button type="submit" class="btn rounded-pill btn-info">Sauvegarder</button>
            </div>
        </div>
    </div>
</form>