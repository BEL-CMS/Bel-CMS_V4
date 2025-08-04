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

namespace Belcms\Pages\Models;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<form action="forum/sendnew" method="post" class="mt-2">
    <div class="input-group mb-2">
        <label class="input-group-text">Titre du sujet</label>
        <input class="form-control" name="title" required type="text" value="" placeholder="Titre du sujet">
    </div>
    <div class="input-group mb-2">
        <textarea name="content" class="bel_cms_textarea_full"></textarea>
    </div>
    <div class="input-group mb-1">
        <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
        <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
    </div>
    <div>
        <input type="hidden" name="captcha_value" value="">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="submit" class="btn btn-warning" value="<?= constant('SEND'); ?>">
    </div>
</form>