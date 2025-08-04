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
use BelCMS\Requires\Common;
use BelCMS\Core\groups;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<ul>
    <?php
    foreach ($data as $key => $value):
        if (User::ifUserExist($value->author)) {
            $user = User::getInfosUserAll($value->author);
            $username = $user->user->username;
            $group    = $user->groups->user_group;
            $nameGroups = Groups::getName($group);
            $colorGroups = $user->user->color;
            $nameGrp = (defined($nameGroups->name)) ? constant($nameGroups->name) : $nameGroups->name;
            $dateRegister = $user->profils->date_registration;
        } else {
            $username = 'Supprimer';
            $group    = null;
            $nameGroups = constant('VISITOR');
            $colorGroups = null;
            $nameGrp = null;
            $dateRegister = date('d M Y H:i:s');
        }
    ?>
    <li>
        <div class="belcms_read">
            <div class="belcms_read_info">
                <div style="margin: auto;"><img src="<?= $_SESSION['USER']->profils->avatar; ?>" alt=""></div>
                <div><?= $username; ?></div>
                <div class="belcms_btn_read" style="color: <?= $colorGroups; ?>"><?= $nameGrp; ?></div>
                <div style="margin-top: 15px;">Rejoins le <?= Common::TransformDate($dateRegister, 'MEDIUM', 'NONE'); ?></div>
            </div>
            <div class="belcms_read_msg">
                <span style="padding: 0;">
                    <h2 class="belcms_forum_title_read">
                        <?= $readtitle->title; ?>
                    </h2>
                </span>
                <p><?= Common::TransformDate($value->date_post,'FULL', 'MEDIUM'); ?></p>
                <?= $value->content; ?>
            </div>
        </div>
    </li>
    <?php
    endforeach;
    ?>
</ul>
<button onclick="location.href='forum/reply/<?= $data[0]->id_mdg; ?>';" type="button" class="btn btn-info">Poster une réponse</button>