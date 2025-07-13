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

use BelCMS\Core\User;
use Belcms\Pages\Models\Forum;
use BelCMS\Requires\Common;
?>
<section id="belcms_forum">
    <?php
    foreach ($forum as $value):
        echo '<div class="belcms_forum_title">
            <a href="#" title="Titre Forum">' . $value->title . '</a>
            <span>' . $value->subtitle . '</span>
        </div>';
        foreach ($value->category as $v):
            $countMsg = isset($v->countMessage) ? $v->countMessage : 0;
            $countSubject = isset($v->countSubject) ? $v->countSubject : 0;
            if (isset($v->threads)) {
                $last   = Forum::getLastMsg($v->threads->id_message);
                $avatar = User::getInfosUserAll($last->author);
                $user   = $avatar->user->username;
                $avatar = $avatar->profils->avatar;
                $date   = Common::TransformDate($last->date_post, 'MEDIUM', 'SHORT');
                $title  = $v->threads->title;
                $thread = $v->threads->id_message;
            } else {
                $avatar = '';
                $date   = '';
                $title  = '';
                $thread = '';
            }
        ?>
            <div class="belcms_forum_cat">
                <div class="belcms_forum_body">
                    <span class="belcms_forum_ico"><i class="<?= $v->icon; ?>"></i></span>
                    <span class="belcms_forum_main_title">
                        <a href="#" title=""><?= $v->title; ?></a>
                        <span><?= $v->subtitle; ?></span>
                    </span>
                    <span class="belcms_forum_subject">
                        <dl class="belcms_forum_subject_pairs">
                            <dt>Sujets</dt>
                            <dd><?= $countSubject; ?></dd>
                        </dl>
                        <dl class="belcms_forum_subject_pairs">
                            <dt>Messages</dt>
                            <dd><?= $countMsg + $countSubject ; ?></dd>
                        </dl>
                    </span>
                    <div class="belcms_last_msg">
                        <div class="belcms_forum_avatar">
                            <a href="Members/<?= $user; ?>" title="avatar_<?= $user; ?>">
                                <img src="<?= $avatar; ?>" alt="avatar_<?= $user; ?>">
                            </a>
                        </div>
                        <ul>
                            <li><a href="Forum/Message/<?= $thread; ?>" title="<?= $title; ?>"><?= $title; ?></a></li>
                            <li><?= $date; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    endforeach;
    ?>
</section>