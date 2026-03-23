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

use BelCMS\Core\User;
use BelCMS\Requires\Common;
?>
<div class="container text-center">
    <div class="row">
        <?php
        foreach ($members as $k => $v):
            $user = User::getInfosUserAll($v->hash_key);
            $username  = $user->user->username;
            $color     = $user->user->color;
            $datedeReg = Common::TransformDate($user->profils->date_registration, 'MEDIUM', 'NONE');
            $avatar    = $user->profils->avatar;
        ?>
            <div class="col-lg-6 col-sm-4 col-xsm-6">
                <div class="belcms_main_members" style="background-color: <?= $_SESSION['TEMPLATE']['background']; ?> !important;">
                    <img class="belcms_main_background_img" src="assets/img/bg_cover.webp" alt="background_user_<?= $username; ?>">
                    <picture>
                        <img src="<?= $avatar; ?>" class="glightbox rounded-circle" alt="Avatar de <?= $username; ?>">
                    </picture>
                    <h2 style="color: <?= $color; ?> !important;"><?= $username; ?></h2>
                    <ul class="belcms_main_listing">
                        <li>Enregistré le<span>12.06.2025</span></li>
                        <li>Poste<span>256</span></li>
                        <li><a href="" class="color: <?= $_SESSION['TEMPLATE']['links']; ?> !important;" title="Message a <?= $username; ?>">Message</a> - <a href="Members/detail/<?= $username; ?>" title="Profil de <?= $username; ?>">Profile</a></li>
                    </ul>
                </div>
            </div>
        <?php
        endforeach;
        echo $pagination;
        ?>
    </div>
</div>