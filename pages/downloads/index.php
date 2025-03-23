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
<div id="belcms_downloads_index">
    <h1><?=constant('DOWNLOADS');?></h1>
    <div class="belcms_donwloads_center">&nbsp;<b>[</b>&nbsp;<a href="Downloads" class="btn btn-info btn-wave">Accueil</a>&nbsp;|&nbsp;<a href="Downloads/New" class="btn btn-success shadow-success btn-wave">Nouveaux</a>&nbsp;|&nbsp;<a href="Downloads/Popular" class="btn btn-warning shadow-warning btn-wave">Populaires</a>&nbsp;|&nbsp;<a href="Downloads/propose" class="btn btn-secondary shadow-secondary btn-wave">Proposer</a>&nbsp;<b>]</b></div>
    <?php
    foreach ($data as $value):
        if (empty($value->banniere)) {
            $banniere = 'assets/img/1.jpg';
        } else {
            $banniere = $value->banniere;
        }
    ?>
    <div class="card text-center mt-3">
        <div class="card-header"><?=$value->name;?></div>
        <div class="card-body">
            <img class="belcms_cat_img" src="<?=$banniere;?>" alt="img_cat_<?=$value->name;?>">
            <div class="belcms_cat_aera"><?=$value->description;?></div>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="Downloads/dls/<?=$value->id;?>" class="btn btn-dark">Entrer dans la catégorie : <?=$value->name;?></a>
        </div>
    </div>
    <?php
    endforeach;
    ?>
</div>
