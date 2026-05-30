<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
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

use BelCMS\Core\groups;
use BelCMS\Core\User;
use BelCMS\Requires\Common;
?>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Avatar</th>
            <th>Nom d'utilisateur</th>
            <th>Grade</th>
            <th>Inscrit le</th>
            <th>Profil</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($members as $k => $v):
            $user = User::getInfosUserAll($v->hash_key);
            $group = groups::getName($user->groups->user_group);
            $group = defined(strtoupper($group->name)) ? constant($group->name) : $group->name;
            $username  = $user->user->username;
            $color     = $user->user->color;
            $datedeReg = Common::TransformDate($user->profils->date_registration, 'MEDIUM', 'NONE');
            $avatar    = $user->profils->avatar;
        ?>
        <tr>
            <td><img class="belcms_members_avatar_primary" src="<?= $avatar; ?>"></td>
            <td style="color: <?= $color; ?>;"><?= $username; ?></td>
            <th><?= $group; ?></th>
            <td><?= $datedeReg; ?></td>
            <td><button type="button" class="btn btn-secondary" onclick="location.href='Members/detail/<?= $username; ?>';">Profil</button></td>
        </tr>
        <?php
        endforeach; 
        ?>
    </tbody>
    <?php echo $pagination; ?>
</table>