<?php
/**
* Bel-CMS [Content management system]
* *  * @version 4.1.1 [PHP8.5]
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
$user = isset($_GET['user']) ? $_GET['user'] : '';
?>
<section id="belcms_section_inbox">
    <div id="belcms_inbox_sidebar">
        <button type="button" class="btn btn-success" onclick="location.href='inbox/new'">Composer</button>
        <a href="#"><i class="fa-solid fa-inbox"></i>&ensp;Boîte de réception</a>
        <a href="#"><i class="fa-solid fa-envelope"></i>&ensp;Archive</a>
        <a href="#"><i class="fa-solid fa-trash-can-arrow-up"></i>&ensp;Corbeille</a>
    </div>
    <div id="belcms_inbox_body">
        <form action="inbox/newsend" method="post" enctype="multipart/form-data">
            <div class="mt-3 mb-3">
                <label class="mb-1"><b>Contact</b></label>
                <input value="<?= $user; ?>" id="belcms_mails_new_author" class="form-control" autocomplete="off" type="search" name="author" required style="max-width: 96%;">
            </div>
            <div class="mt-3 mb-3">
                <label class="mb-1"><b>Ajouter un objet</b></label>
                <input class="form-control" autocomplete="on" type="text" name="object" required style="max-width: 96%;">
            </div>
            <div class="mb-3">
                <textarea class="bel_cms_textarea_simple" name="content"></textarea>
            </div>
            <div class="mt-3 mb-3">
                <input type="submit" class="btn btn-secondary" value="Envoyer">
            </div>
        </form>
    </div>
</section>