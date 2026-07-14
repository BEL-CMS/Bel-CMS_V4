<?php

use BelCMS\Core\Notification;
/**
 * Bel-CMS [Content management system]
*  * @version 4.1.1 [PHP8.5]
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
if (empty($members)) {
    Notification::error('Erreur dans le profils, la cause est surement un espace', 'Membre');
    return;
}
$avatar = (empty($value->avatar)) ? constant('DEFAULT_AVATAR') : $value->avatar;
?>
<nav class="mb-3 mt-3" id="belcms_members_nav">
    <ul class="pagination">
        <?php foreach (range('a', 'z') as $l): ?>
            <li class="page-item <?= $letter === $l ? 'active' : ''; ?>">
                <a class="page-link" href="members?letter=<?= $l; ?>">
                    <?= strtoupper($l); ?>
                </a>
            </li>
        <?php endforeach; ?>
        <li class="page-item <?= $letter === '0' ? 'active' : ''; ?>">
            <a class="page-link" href="members?letter=0">
                #
            </a>
        </li>
    </ul>
</nav>

<table class="table table-striped table-hover DataTableBelCMS">
    <thead class="table-dark">
        <tr>
            <th class="belcms_members_th_width">Pays</th>
            <th class="belcms_members_th_width">Avatar</th>
            <th>Nom d'utilisateur</th>
            <th>Inscrit le</th>
            <th>Anniversaire</th>
            <th>Profil</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($members as $k => $value):
        ?>
        <tr>
            <td>
            <?php
            if (!empty($value->country)):
                $pays = substr($value->country, 0, 2);
                $pays = strtolower($pays);
                echo '<img class="belcms_members_country" src="assets/img/country/'.$pays.'.png" alt="Pays '.$pays.'">'; 
            else:
                echo '<img class="belcms_members_country" src="assets/img/country/non.png" alt="Pays aucun">';
            endif;
            ?>
            </td>
            <td><img class="belcms_members_table_avatar" src="<?= $avatar; ?>" alt="avatar - <?= $value->username; ?>"></td>
            <td><?= $value->username ?></td>
            <td><?= Common::TransformDate($value->date_registration, 'MEDIUM', 'NONE'); ?></td>
            <td>
            <?php
            if (!empty($a['profils']->birthday)):
            ?>
                <?= Common::TransformDate($value->birthday, 'LONG', 'NONE'); ?>
            <?php
            else:
            ?>
            Information manquante
            <?php
            endif;
            ?>
            </td>
            <td><button type="button" class="btn btn-secondary" onclick="location.href='Members/detail/<?= Common::FormatName($value->username); ?>';">Profil</button></td>
        </tr>
        <?php
        endforeach; 
        ?>
    </tbody>
</table>