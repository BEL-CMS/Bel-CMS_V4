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
?>
<section id="belcms_section_inbox">
    <div id="belcms_inbox_sidebar">
        <button type="button" class="btn btn-secondary" onclick="location.href='inbox/new'">Composer</button>
        <a href="#"><i class="fa-solid fa-inbox"></i>&ensp;Boîte de réception</a>
        <a href="#"><i class="fa-solid fa-envelope"></i>&ensp;Archive</a>
        <a href="#"><i class="fa-solid fa-trash-can-arrow-up"></i>&ensp;Corbeille</a>
    </div>
    <div id="belcms_inbox_body">
        <table id="belcms_inbox_items">
            <?php
            foreach ($data as $key => $value):
                if ($value->archive == 0):
                    debug($value);
                ?>
                    <tr>
                        <td class="belcms_inbox_items_msg bg-secondary bg-gradient">
                            <label class="form-check-label" for="flexCheckIndeterminate1">
                                <span class="badge rounded-pill bg-success belcms_tooltip_left" data="Nouveau message">Nouveau</span>
                                <img src="<?= $value->author; ?>" class="belcms_inbox_avatar belcms_tooltip_left" alt="avatar" data="Utilisateur">
                                <a class="text-dark" href="#"><?= $value->object; ?></a>
                                <span class="belcms_inbox_items_date"><?= $value->date; ?></span>
                            </label>
                        </td>
                    </tr>
                <?php
                endif;
            endforeach;
            ?>
        </table>
    </div>
</section>