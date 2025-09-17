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

include ('header.php');
?>
<div class="belcms_links_container">
    <ul class="belcms_links_list">
        <?php
        foreach ($cat as $key => $value):
        ?>
        <li class="belcms_links_item" style="border-color: <?= $value->color; ?>">
            <a href="links/viewall/<?= $value->id;?>"><?= $value->name; ?></a>
            <span><?= $value->description; ?></span>
        </li>
        <?php
        endforeach;
        ?>
    </ul>
    <div class="belcms_links_tags">
        <div id="belcms_links_stats">( Il y a <i><?= $nblink; ?></i> Liens & <i><?= $nbcat; ?></i> Catégories dans la base de données )</div>
    </div>
</div>