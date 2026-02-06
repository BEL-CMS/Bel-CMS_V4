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

if ($data['status'] == 'open') {
	$ckd = 'checked="checked"';
} else {
	$ckd = '';
}

?>
<form action="unavailable/send?management&option=parameter" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Maintenance : Statut du site
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="custom-card">
                            <div class="row gy-3">
                                <div>
                                    <div class="custom-toggle-switch d-flex align-items-center mb-2">
                                        <input id="Activerjmtn" name="close" type="checkbox"  <?=$ckd?>>
                                        <label for="Activerjmtn" class="label-success"></label><span class="ms-3">Ouvert</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <span class="input-group-text">Nom</span>
                                <input type="text" name="title" class="form-control" value="<?=$data['title']?>">
                            </div>
                                <textarea class="mt-3" style="width:98%; margin: auto;" name="description" rows="4" spellcheck="true"><?=$data['description']?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Sauvegarder les changements</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
            