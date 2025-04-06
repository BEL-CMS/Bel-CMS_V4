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
<section id="belcms_gallery">
    <h2>Galerie de photos</h2>
    [ <a href="Gallery" title="Galerie home">Index</a> | <a href="Gallery/new" title="Galerie nouveauté">Nouveaux</a> | <a href="Gallery/popular" title="Galerie les plus Populaire">Populaire</a> | <a href="Gallery/propose" title="Galerie Proposé">Proposé</a> ]
    <form action="gallery/SendNew" method="post" enctype="multipart/form-data">
        <div class="input-group mb-2 mt-3">
            <div class="form-floating">
                <input name="name" type="text" placeholder="Entrer le nom de la photo" value="" class="form-control" required>
                <label><i class="fa-solid fa-signature"></i> Nom de la photo</label>
            </div>
        </div>
        <div class="input-group mb-2">
            <textarea name="description" class="bel_cms_textarea_simple"></textarea>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="multiplefiles"><?= Common::ConvertSize(Common::GetMaximumFileUploadSize()); ?> max</label>
            <input type="file" name="image" class="form-control" id="multiplefiles" accept="image/*,.webp">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?><div></div></label>
            <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
        </div>
        <div>
            <input type="hidden" name="captcha_value" value="">
            <input type="submit" class="btn btn-warning" value="<?= constant('SEND'); ?>">
        </div>
    </form>
</section>