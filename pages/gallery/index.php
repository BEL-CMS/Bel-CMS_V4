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
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="Gallery"><?= $_SESSION['CONFIG']['CMS_NAME']; ?> :: Galerie de photos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="Gallery">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="Gallery/propose">Proposé</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-light border-bottom pt-3 pb-3">
        <div class="container">
            <h1 class="fw-semibold mb-2 belcms_bnv" id="belcms_bnv">Toutes nos photos se trouvent ici.</h1>
            <p class=" lead text-secondary" style="text-align: center;"></p>
        </div>
    </div>
    <div id="belcms_gallery_cat">
        <?php
        foreach ($cat as $v):
            $bg = (empty($v->background)) ? '/assets/img/no-image-png.png' : $v->background;
        ?>
            <div class="belcms_main_gallery_box">
                <div class="belcms_main_gallery_bg">
                    <div style="background: <?= $v->color; ?>">
                        <a href="Gallery/subcat/<?= $v->id; ?>" title="<?= $v->name; ?>">
                            <img class="belcms_main_gallery_img" src="<?= $bg; ?>">
                        </a>
                    </div>
                    <a href="Gallery/subcat/<?= $v->id; ?>" title="lien - <?= $v->name; ?>"><?= $v->name; ?></a>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</section>