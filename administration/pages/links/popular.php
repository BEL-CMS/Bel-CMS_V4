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
?>
<section id="belcms_links_cat">
    <h2>Les liens les plus populaire</h2>
    <div class="mb-2" id="belcms_links_menu">
        [ <a href="Links" title="Lien">Index</a> | <a href="Links/new" title="Nouveau liens">Nouveaux lien</a> | <a class="active" href="Links/popular" title="les plus Populaire">Les liens les plus fréquentés.</a> | <a href="Links/propose" title="Proposé un lien">Proposé un lien</a> ]
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
<?php echo $pagination; ?>