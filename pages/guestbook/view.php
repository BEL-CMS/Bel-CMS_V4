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

use BelCMS\Requires\Common;
?>
<div class="card belcms_header">
    <div class="card-header" id="belcms_header_title">
        <h2><i class="fa-solid fa-angles-right"></i> Livre d'or</h2>
        <a href="guestbook" title="home guestbook">Ecrire un message</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section">Bienvenue sur le livre d'or</h3>
    </div>
</div>
<div class="card mb-3" style="max-width: 100%;margin-bottom:25px;">
    <table class="table table-hover table-striped">
    <?php
    foreach ($data as $key => $value):
        $message = html_entity_decode($value->message, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    ?>
    <tr>
        <td><img src="<?= $value->avatar ?>" class="img-fluid rounded-start guestbook_avatar" alt="avatar_<?= $value->username; ?>"></td>
        <td><h5 class="card-title"><?= $value->username; ?></h5></td>
        <td colspan="2" class="belcms_color_text"><?= $message; ?></td>
        <td><?= Common::TransformDate($value->date_insert, 'MEDIUM', 'MEDIUM'); ?></td>
    </tr>
    <?php
    endforeach;
    ?>
    </table>
</div>