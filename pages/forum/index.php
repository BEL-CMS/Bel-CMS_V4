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

use BelCMS\Core\User;
use BelCMS\Requires\Common;
use Belcms\Pages\Models\Forum;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<section id="belcms_forum">
<?php
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
                if (User::ifUserExist($last->author)) {
                    $user   = $avatar->user->username;
                    $avatar = $avatar->profils->avatar;   
                } else {
                    $user   = 'Supprimer';
                    $avatar = constant('DEFAULT_AVATAR');
                }
                $date   = Common::TransformDate($last->date_post, 'MEDIUM', 'SHORT');
                $title  = $v->threads->title;
                $thread = $v->threads->id_message;
                $last = '   <div class="belcms_forum_cat_last_msg">
                                <a href="forum/readpost/'.$v->threads->id_message.'" title="'.$title.'"><i class="fa-solid fa-book-open"></i> '.$title.'</a>
                                <span>
                                    <a href="Members/detail/'.$user.'" title="membres_'.$user.'">
                                        <i class="fa-solid fa-user"></i> '.$user.'
                                    </a>
                                    <i style="margin: 0px 3px 0px 5px;" class="fa-solid fa-clock"></i> '.$date.'
                                </span>
                            </div>';
            } else {
                $avatar = '';
                $date   = '';
                $title  = '';
                $thread = '';
                $user   = '';
                $last   = '';
            }
        ?>
            <li>
                <div class="belcms_forum_cat_logo">
                    <i class="<?= $v->icon; ?>"></i>
                </div>
                <div class="belcms_forum_cat_title">
                    <a href="forum/subforum/<?= $v->id; ?>" title="forum_<?= $v->title; ?>"><?= $v->title; ?></a>
                    <span><?= $v->subtitle; ?></span>
                </div>
                <div class="belcms_forum_cat_infos">
                    <span><?= $countSubject; ?> <b>sujets</b></span>
                    <span><?= $countMsg + $countSubject ; ?> <b>réponses</b></span>
                </div>
                <?= $last; ?>
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