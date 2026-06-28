<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form action="training/optionActive?admin&option=aseh" method="post">
    <div class="row">
        <div class="col-12 col-xl-6 mt-3">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Indiquez votre lieu et la date souhaitée.</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row main-select">
                                        <select class="form-select" name="lieu">
                                            <option value="false">Aucune information datée n'est disponible.</option>
                                            <?php
                                            foreach ($data as $key => $value):
                                                $date = Common::TransformDate($value->date_activite, 'FULL');
                                            ?>
                                            <option value="<?= $value->id; ?>"><?= $value->lieu; ?> -- <?= $date; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <div class="col-md-6 mt-3 mt-md-0">
                                            <div class="col-12 col-xl-12 mt-3 mb-5"><button type="submit" class="btn btn-primary">Sauvegarder</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>