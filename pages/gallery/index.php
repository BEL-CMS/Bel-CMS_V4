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
<section id="belcms_gallery">
    <h2>Galerie de photos</h2>
    [ <a href="Gallery" title="Galerie home">Index</a> | <a href="Gallery/new" title="Galerie nouveauté">Nouveaux</a> | <a href="Gallery/popular" title="Galerie les plus Populaire">Populaire</a> | <a href="Gallery/propose" title="Galerie Proposé">Proposé</a> ]
    <div id="belcms_gallery_cat">
        <?php
        foreach ($cat as $v):
            $bg = (empty($v->background)) ? '/assets/img/no-image-png.png' : $v->background;
        ?>
            <div class="belcms_main_gallery_box">
                <div class="belcms_main_gallery_bg">
                    <div style="background: <?= $v->color; ?>">
                        <a href="Gallery/subcat/<?= $v->id_cat; ?>" title="<?= $v->name; ?>">
                            <img class="belcms_main_gallery_img" src="<?= $bg; ?>">
                        </a>
                    </div>
                    <a href="Gallery/subcat/<?= $v->id_cat; ?>" title="lien - <?= $v->name; ?>"><?= $v->name; ?></a>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</section>