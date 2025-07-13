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
<section id="belcms_links_cat">
    <h2><?= $cat->name; ?></h2>
    <div class="mb-5" id="belcms_links_menu">
        [ <a href="Links" title="Lien">Index</a> | <a href="Links/new" title="Nouveau liens">Nouveaux lien</a> | <a href="Links/popular" title="les plus Populaire">Les liens les plus fréquentés.</a> | <a href="Links/propose" title="Proposé un lien">Proposé un lien</a> ]
    </div>
    <?php
    foreach ($links as $value):
    ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><a href="<?= $value->link; ?>"> <?= $value->name; ?></a> <span class="view"><i class="fa-solid fa-eye"></i> <?= $value->view; ?></span></h5>
                <div class="card-text"><?= $value->description; ?></div>
                <a href="Links/link/<?= $value->id; ?>" class="btn btn-primary">Lire +</a>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</section>