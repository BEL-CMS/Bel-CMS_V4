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
    <div id="belcms_links_menu" class="mb-3 mt-3">
        [ <a class="active" href="Links" title="Lien">Index</a> | <a href="Links/new" title="Nouveau liens">Nouveaux lien</a> | <a href="Links/popular" title="les plus Populaire">Les liens les plus fréquentés.</a> | <a href="Links/propose" title="Proposé un lien">Proposé un lien</a> ]
    </div>
    <div id="belcms_links_cat" class="row mb-3 mt-3">
        <?php
        foreach ($cat as $k => $v):
        ?>
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <h5 class="card-title"><?= $v->name; ?></h5>
                    <div class="card-text"><?= $v->description; ?></div>
                    <a href="links/cat/<?= $v->id; ?>" style="background:<?= $v->color?> !important;color: #000" class="btn btn-primary">Voir le lien</a>
                </div>
            </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
    <div id="belcms_links_stats">
        ( Il y a <i><?= $nblink; ?></i> Liens & <i><?= $nbcat; ?></i> Catégories dans la base de données )
    </div>
</section>