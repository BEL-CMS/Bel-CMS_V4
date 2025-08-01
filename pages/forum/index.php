<section id="belcms_forum">
    <?php

use BelCMS\Core\User;
use BelCMS\Requires\Common;
use Belcms\Pages\Models\Forum;

    foreach ($forum as $value):
    ?>
    <div class="belcms_forum_cat">
        <h3><?= $value->title; ?></h3>
        <ul>
        <?php
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
            <li>
                <div class="belcms_forum_cat_logo">
                    <i class="<?= $v->icon; ?>"></i>
                </div>
                <div class="belcms_forum_cat_title">
                    <a href="#" title="#"><?= $v->title; ?></a>
                    <span><?= $v->subtitle; ?></span>
                </div>
                <div class="belcms_forum_cat_infos">
                    <span><?= $countSubject; ?> <b>sujets</b></span>
                    <span><?= $countMsg + $countSubject ; ?> <b>réponses</b></span>
                </div>
                <div class="belcms_forum_cat_last_msg">
                    <a href="#" title="#"><i class="fa-solid fa-book-open"></i> <?= $title; ?></a>
                    <span> <a href="#" title="#"><i class="fa-solid fa-user"></i> <?= $user; ?></a>
                        <i style="margin: 0px 3px 0px 5px;" class="fa-solid fa-clock"></i> <?= $date; ?>
                    </span>
                </div>
            </li>
        <?php
        endforeach;
        ?>
        </ul>
    </div>
    <?php 
    endforeach;
    ?>
</section>