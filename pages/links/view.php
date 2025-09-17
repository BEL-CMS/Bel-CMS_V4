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

use BelCMS\Core\Comment;
use BelCMS\Core\User;
use BelCMS\Requires\Common;
if (User::ifUserExist($links->author)) {
    $user = User::getInfosUserAll($links->author);
    $user = $user->user->username;
} else {
    $user = 'inconnu';
}
if (!empty($this->img)) {
    $img = $this->img;
} else {
    $img = null;
}
?>
  <div class="belcms_links_page">
    <div class="belcms_links_title"><?= $links->name; ?></div>
    <div class="belcms_links_url">🔗 <a href="Links/Click/<?= $links->id; ?>" target="_blank" title="<?= $links->name; ?>"><?= $links->link; ?></a></div>
    <div class="belcms_links_description"> <?= $links->description; ?></div>

    <div class="belcms_links_stats">
      <div class="belcms_links_stat">👁️ Vues : <?= $links->view; ?></div>
      <div class="belcms_links_stat">🖱️ Clics :<?= $links->click; ?></div>
      <div class="belcms_links_stat">📅 Publié le : <?= Common::TransformDate($links->date_insert, 'FULL', 'NONE'); ?></div>
      <div class="belcms_links_stat">✍️ Publié par : <?= $user; ?></div>
    </div>
    <!-- À implanté plus tard
    <div class="belcms_links_tags">
      <span class="belcms_links_tag">#CSS</span>
      <span class="belcms_links_tag">#Flexbox</span>
      <span class="belcms_links_tag">#Jeu</span>
      <span class="belcms_links_tag">#Apprentissage</span>
    </div>
    -->
  </div>
<?php
$comments = new Comment;
$comments->html();