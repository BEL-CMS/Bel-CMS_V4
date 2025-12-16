
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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form action="newsletter/sendmail?management&option=pages" method="post">
    <div class="row">
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Selection de groupes</div>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($groups as $key => $value):
                        $name = (defined($value->name) == true) ? constant($value->name) : $value->name;
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input name="groups[]" value="<?= $value->id_group; ?>" class="form-check-input mt-0" type="checkbox" style="cursor: pointer;">
                        </div>
                        <input type="text" class="form-control" value="<?= $name; ?>" disabled>
                    </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input name="newsletter" checked value="true" class="form-check-input mt-0" type="checkbox" style="cursor: pointer;">
                        </div>
                        <input type="text" class="form-control" value="Les inscrit de la newsletter" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Selection du template</div>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($template as $key => $value):
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input name="tpl" required value="<?= $value->id; ?>" class="form-check-input mt-0" type="radio" style="cursor: pointer;">
                        </div>
                        <input type="text" class="form-control" value="<?= $value->name; ?>" disabled>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning-gradient btn-wave mt-1 mb-1">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</form>
