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
if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div id="belcms_forum_reply">
    <form action="forum/forum_send_reply" method="post" enctype="multipart/form-data">
        <textarea name="content" class="bel_cms_textarea_simple"></textarea>
        <div class="mb-3 mt-3">
            <input class="form-control form-control-sm" type="file" name="files" accept="audio/*, video/*, image/*, pdf, .doc,.docx">
        </div>
        <div class="mb-3 mt-3">
            <button type="submit" class="btn btn-secondary">Répondre</button>
            <input type="hidden" value="<?= $code; ?>" name="code">
        </div>
        <div style="clear: both"></div>
    </form>
</div>