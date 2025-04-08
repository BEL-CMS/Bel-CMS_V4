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
?>
<section id="belcms_links">
    <h2>Galerie de lien</h2>
    <div id="belcms_links_menu">
        [ <a href="Links" title="Lien">Index</a> | <a href="Links/new" title="Nouveau liens">Nouveaux lien</a> | <a href="Links/popular" title="les plus Populaire">Lien les plus Populaire</a> | <a href="Links/propose" title="Proposé un lien">Proposé un lien</a> ]
    </div>
    <div id="belcms_links_cat">
        <?php
        foreach ($cat as $k => $v):
        ?>
            <span>
                <a style="color:#<?= $v->color; ?>" href="links/cat/<?=$v->id;?>">&#10150;<?= $v->name; ?></a>
                <p>&#10149;<?= $v->description; ?></p>
            </span>
        <?php
        endforeach;
        ?>
    </div>
    <div id="belcms_links_stats">
        ( Il y a <i><?=$nblink;?></i> Liens & <i><?=$nbcat;?></i> Catégories dans la base de données )
    </div>
</section>