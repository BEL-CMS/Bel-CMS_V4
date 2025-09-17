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
foreach ($links as $key => $value):
?>
<div class="belcms_links_container">
    <div class="belcms_links_name">🔗 <a href="links/view/<?= $value->id; ?>"><?= $value->name; ?></a></div>
    <div class="belcms_links_stats">
        <div class="belcms_links_stat">
            <span>👁️ Vues</span>
            <span><?= $value->view; ?></span>
        </div>
        <div class="belcms_links_stat">
            <span>🖱️ Clics</span>
            <span><?= $value->click; ?></span>
        </div>
    </div>
</div>
<?php
endforeach;
?>