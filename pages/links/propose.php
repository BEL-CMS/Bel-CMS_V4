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
    <h2>Proposition de lien</h2>
    <div id="belcms_links_menu">
        [ <a href="Links" title="Lien">Index</a> | <a href="Links/new" title="Nouveau liens">Nouveaux lien</a> | <a href="Links/popular" title="les plus Populaire">Les liens les plus fréquentés.</a> | <a class="active" href="Links/propose" title="Proposé un lien">Proposé un lien</a> ]
    </div>
    <form action="links/SendNew" method="post" enctype="multipart/form-data">
        <div class="input-group mb-2 mt-3">
            <div class="form-floating">
                <input name="name" type="text" placeholder="le nom du lien" class="form-control" required>
                <label><i class="fa-solid fa-font"></i> Nom</label>
            </div>
        </div>
        <div class="input-group mb-2 mt-3">
            <div class="form-floating">
                <input name="link" type="url" value="https://" placeholder="le lien" value="" class="form-control" required>
                <label><i class="fa-solid fa-link"></i> lien</label>
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