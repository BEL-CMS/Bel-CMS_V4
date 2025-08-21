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
                <div class="belcms_main_members">
                    <picture>
                        <img class="glightbox" src="<?= $avatar; ?>" alt="Avatar de <?= $username; ?>">
                    </picture>
                    <h2 style="color: <?= $color; ?>"><?= $username; ?></h2>
                    <span><small style="color:#FFF;">Enregistré le : <?= $datedeReg; ?></small></span>
                    <hr>
                    <a href="Members/detail/<?= $username; ?>" title="Membre <?= $username; ?>" class="bg-info text-dark">Visualiser la fiche publique</a>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>