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

    foreach ($threads as $key => $value):
    ?>
    <div class="belcms_forum_card">
        <div class="belcms_forum_title">💬 <a href="forum/forumMsg/<?= $value->id_message; ?>"><?= $value->title; ?></a></div>
        <div class="belcms_forum_stats">Messages : <?= $value->countMsg; ?> | Vues : <?= $value->view_post; ?></div>
        <div class="belcms_forum_meta">Dernier message par <strong>Stive</strong> le <em><?= Common::TransformDate($value->date_post, 'FULL','MEDIUM'); ?></em></div>
    </div>
    <?php
    endforeach;