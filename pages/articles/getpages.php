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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<section id="belcms_articles">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Date de parution</th>
                <th scope="col">Author</th>
                <th scope="col">Nombre de vu</th>
                <th scope="col">Lecture</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $value):
                if (User::ifUserExist($value->author)) {
                    $author = User::getInfosUserAll($value->author)->user->username;
                }
            ?>
                <tr>
                    <th scope="row"><a href="articles/read/<?= $value->id; ?>" title="<?= $value->name; ?>">
                            <h2 class="belcms_read_value"> <?= $value->name; ?></h2>
                        </a></th>
                    <td><?= Common::TransformDate($value->publish, 'FULL', 'MEDIUM'); ?></td>
                    <td><?= $author; ?></td>
                    <td><?= $value->view; ?></td>
                    <td>
                        <a href="articles/read/<?= $value->id; ?>">
                            <h2 class="belcms_read_value">Lire</h2>
                        </a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</section>
