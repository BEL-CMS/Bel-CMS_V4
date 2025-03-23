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
<div id="belcms_main_forum">
    <h1 style="display: none;">Forum Threads</h1> <!-- Only SEO -->
    <?php
    foreach ($post as $key => $value):
        $user = User::ifUserExist($value->author);
        if (!$user == false) {
            $user = User::getInfosUserAll($value->author);
            $user = '<i style="color:' . $user->user->color . '">' . $user->user->username . '</i>';
        } else {
            $user = 'Utilisateur inconnu';
        }
    ?>
        <div class="belcms_grid_contenair">
            <a href="Forum/Message/<?= $value->id_message; ?>" title="<?= $value->title; ?>" class="belcms_grid_contenair_threads_box">
                <h3><?= $value->title; ?></h3>
                <p><strong>Date:</strong> <?= Common::TransformDate($value->date_post, 'FULL', 'SHORT'); ?></p>
                <div class="belcms_grid_contenair_threads_box_infos">
                    <span><strong>Auteur : </strong> Stive</span>
                    <span><strong>Dernier message : </strong> par <?= $user; ?>, le 11 mars 2025</span>
                </div>
            </a>
        </div>
    <?php
    endforeach;
    ?>
</div>
