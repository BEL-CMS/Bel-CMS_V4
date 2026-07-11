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

if (!defined('CHECK_INDEX')) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
}
?>
<div id="belcms_forum_reply">
    <form action="forum/sendnew" method="post" class="mt-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Titre du sujet</span>
            <input type="text" class="form-control" name="title" required>
        </div>
        <textarea name="content" class="bel_cms_textarea_full"></textarea>
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="submit" class="btn btn-secondary btn-sm mt-3" value="Enregistrer">
    </form>
</div>