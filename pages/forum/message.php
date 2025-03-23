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

use BelCMS\Core\Groups;
use BelCMS\Core\User;
use Belcms\Pages\Controller\Forum;
use BelCMS\Requires\Common;
?>
<div id="belcms_forum_message">
    <span id="belcms_forum_title_msg"><?= $title->title; ?></span>
    <button type="button" onclick="location.href='Forum/Reply/<?= $msg[0]->id_mdg; ?>'" class="btn btn-secondary belcms_reply">Répondre</button>
    <div style="clear: both"></div>
    <?php
    foreach ($msg as $value):
        if (User::ifUserExist($value->author) == true) {
            $user = User::getInfosUserAll($value->author);
        }
        $date = Common::TransformDate($value->date_post, 'FULL', 'MEDIUM');
        $extension = pathinfo($user->profils->avatar, PATHINFO_EXTENSION);
        $group = Groups::getName($user->groups->user_group);
        $groupName = defined(strtoupper($group->name)) ? constant(strtoupper($group->name)) : ucfirst($group->name);
    ?>
        <div class="belcms_forum_global">
            <div class="belcms_forum_msg_user">
                <picture>
                    <?php
                    if ($extension == 'webp'):
                    ?>
                        <source srcset="<?= $user->profils->avatar; ?>" type="image/webp" class="glightbox" />
                        <img src="<?= $user->profils->avatar; ?>" alt="Avatar_<?= $user->user->username; ?>" class="glightbox" />
                    <?php
                    else:
                    ?>
                        <img src="<?= $user->profils->avatar; ?>" alt="Avatar_<?= $user->user->username; ?>" class="glightbox" />
                    <?php
                    endif;
                    ?>
                </picture>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $user->user->username; ?></li>
                    <li class="list-group-item" style="color:<?= $user->user->color; ?>"><?= $groupName; ?></li>
                    <li class="list-group-item">Post : <?= Forum::countMsg($value->author); ?></li>
                </ul>
            </div>
            <div class="belcms_forum_msg_content">
                <div class="belcms_forum_msg_content_infos">
                    <i class="fa-solid fa-clock"></i> <?= $date ?>
                </div>
                <div class="belcms_forum_msg_content_msg">
                    <?= Common::VarSecure($value->content, 'html');
                    if (!empty($value->files)):
                    ?>
                        <br />
                        <a href="<?= $value->files; ?>" alt="file_forum">Fichier</a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>