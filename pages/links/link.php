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

$links = current($links);
if (User::ifUserExist($links->author)) {
    $user = User::getInfosUserAll($links->author);
    $user = $user->user->username;
} else {
    $user = 'Utilisateur supprimé';
}
?>
<section id="belcms_links_link">
    <h2 id="belcms_links_title"><?= $links->name; ?></h2>
    <ul id="belcms_links_content_ul">
        <li><span>Nom :</span><span><?= $links->name; ?></span></li>
        <li><span>Utilisateur :</span><span><?= $user; ?></span></li>
        <li><span>Ajouté le :</span><span><?= Common::TransformDate($links->date_insert, 'MEDIUM', 'MEDIUM'); ?></span></li>
        <li><span>Visité :</span><span><?= $links->view; ?></span></li>
        <li><span>Cliqué :</span><span><?= $links->click; ?></span></li>
    </ul>
    <div id="belcms_links_content_desc"><?= $links->description; ?></div>
    <a id="belcms_links_click" href="Links/Click/<?= $links->id; ?>" class="btn btn-info" title="lien <?= $links->name; ?>">Visté le site</a>
</section>