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

use BelCMS\Core\Notification;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<section id="belcms_forum">
    <button onclick="location.href='forum/newpost/<?= $id; ?>';" type="button" class="btn btn-info">Nouveau sujet</button>
    <div class="belcms_forum_cat">
        <ul>
        <?php
        if (!empty($data)) {
            foreach ($data as $key => $v):
                    $last       = null;

                    if (User::ifUserExist($v->author)) {
                        $user       = User::getInfosUserAll($v->author);
                        $username   = $user->user->username;
                        $avatar     = $user->profils->avatar;
                    } else {
                        $username   = 'Supprimer';
                        $avatar = constant('DEFAULT_AVATAR');
                    }
                    $nbReadMsg  = Forum::readNbMsg($v->id_message);
                    $lastMsg    = Forum::lastMsgRead ($v->id_message);
                    if (isset($lastMsg->author)) {
                        if (User::ifUserExist($lastMsg->author)) {
                            $userLast = User::getInfosUserAll($lastMsg->author);
                            $userLast = $userLast->user->username;
                        } else {
                            $userLast = null;
                        }
                    } else {
                        $userLast = null;
                    }
                    if (!empty($lastMsg)):
                    $last = '   <div class="belcms_forum_cat_last_msg">
                                    <span style="margin-top: 8px;margin-right:5px;">
                                        <a href="Members/detail/'.$userLast.'" title="membres_'.$userLast.'">
                                            <i class="fa-solid fa-user"></i>'.$userLast.'
                                        </a>
                                    </span>
                                    <span><i style="margin: 5px 5px 0px 0px;" class="fa-solid fa-clock"></i>'.Common::TransformDate($lastMsg->date_post,'FULL', 'MEDIUM').'</span>
                                </div>';
                    endif;
            ?>
                <li>
                    <div class="belcms_forum_cat_logo">
                        <img src="<?= $avatar; ?>" alt="avatar_<?= $username; ?>">
                    </div>
                    <div class="belcms_forum_cat_title">
                        <a href="forum/readpost/<?= $v->id_message; ?>" title="forum_<?= $v->title; ?>"><?= $v->title; ?></a>
                        <span><?= $username; ?> - <?= Common::TransformDate($v->date_post, 'FULL', 'MEDIUM'); ?></span>
                    </div>
                    <div class="belcms_forum_cat_infos">
                        <span><?= $v->view_post; ?> <b>Lecture</b></span>
                        <span><?= $nbReadMsg; ?> <b>Réponses</b></span>
                    </div>
                    <?= $last; ?>
                </li>
            <?php
            endforeach;
        } else {
            Notification::warning('Aucun poste actuellement', 'Forum');
        }
            ?>
        </ul>
    </div>
</section>

