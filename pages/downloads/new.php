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

use BelCMS\Core\like;
use BelCMS\Requires\Common;
?>
<div id="belcms_downloads_index">
    <h1><?=constant('DOWNLOADS');?></h1>
    <div class="belcms_donwloads_center">&nbsp;<b>[</b>&nbsp;<a href="Downloads" class="btn btn-info btn-wave">Accueil</a>&nbsp;|&nbsp;<a href="Downloads/New" class="btn btn-success shadow-success btn-wave">Nouveaux</a>&nbsp;|&nbsp;<a href="Downloads/Popular" class="btn btn-warning shadow-warning btn-wave">Populaires</a>&nbsp;|&nbsp;<a href="Downloads/propose" class="btn btn-secondary shadow-secondary btn-wave">Proposer</a>&nbsp;<b>]</b></div>
</div>
<div id="belcms_downloads_index">
    <?php
    foreach ($data as $v):
        $NewLike = new like('downloads', $v->id);
        $mime    = is_file($v->download) ? mime_content_type($v->download) : null;
        $screen  = !is_file($v->screen)  ? 'pages/downloads/no_image.jpg' : $v->screen;
        $like    = $NewLike->test() !== true ? 'Vous avez préalablement voté' : '+1 like';
        $nbLikes = $NewLike->getLikes();
    ?>
    <div class="card custom-card border border-secondary mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <span class="avatar avatar-xl">
                        <img class="belcms_img_downloads_index" src="<?=$screen;?>" alt="image_<?=$v->name;?>">
                    </span>
                </div>
                <div>
                    <p class="card-text text-info mb-1 fs-14 fw-medium"><?=$v->name;?></p>
                    <div class="card-title fs-12 mb-1">Type Mime : <?=$mime;?></div>
                    <div class="card-title text-muted fs-11 mb-0">Date de parution : <?=Common::TransformDate($v->date, 'FULL', 'SHORT')?></div>
                </div>
                <div class="belcms_like_downloads_index belcms_tooltip_left" data="<?=$like;?>"><a href="/downloads/pluslike?echo" class="like" data-id="<?=$v->id;?>"><?=$nbLikes;?> <i class="fa-solid fa-heart" style="color: #ff7171;"></i></a></div>
                <div class="belcms_dls_downloads_index"><a href="Downloads/Detail/<?=$v->id;?>" class="btn btn-secondary">Lire la suite</a></div>
            </div>
        </div>
    </div>
    <?php
    endforeach;
    ?>
</div>