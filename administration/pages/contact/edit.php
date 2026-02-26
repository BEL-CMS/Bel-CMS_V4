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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form action="contact/sendeditcat?Admin&option=pages" method="post">
    <div class="row">
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">Editer une catégorie</div>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="staticcat" class="col-sm-2 col-form-label">Le nom :</label>
                        <div class="col-sm-10">
                            <input name="content" value="<?= $name; ?>" type="text" class="form-control" id="staticcat" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" class="btn btn-primary"><?= constant('SAVE') ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>