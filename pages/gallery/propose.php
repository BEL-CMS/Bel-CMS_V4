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
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="Gallery"><?= $_SESSION['CONFIG']['CMS_NAME']; ?> :: Galerie de photos</a>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="Gallery">Accueil</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-light border-bottom pt-3 pb-3 mb-3">
        <div class="container">
            <h1 class="fw-semibold mb-2 belcms_bnv" id="belcms_bnv">Proposé une image.</h1>
            <p class=" lead text-secondary" style="text-align: center;"></p>
        </div>
    </div>
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