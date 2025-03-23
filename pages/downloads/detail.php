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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (User::ifUserExist($data->uploader)) {
    $author = User::getInfosUserAll($data->uploader);
    $author = '<i style="color:'.$author->user->color.'">'.$author->user->username.'</i>';
} else {
    $author = constant('MEMBER_DELETE');
}
$screen = !is_file($data->screen)  ? 'assets/img/bg_effect.png' : $data->screen;
$md5    = is_file($data->download) ? md5_file($data->download) : null;
$mime   = is_file($data->download) ? mime_content_type($data->download) : null;
$size   = is_file($data->download) ? Common::ConvertSize(filesize($data->download)) : null;
?>
<div id="belcms_downloads_index">
    <h1><?=constant('DOWNLOADS');?></h1>
    <div class="belcms_donwloads_center">&nbsp;<b>[</b>&nbsp;<a href="Downloads" class="btn btn-info btn-wave">Accueil</a>&nbsp;|&nbsp;<a href="Downloads/New" class="btn btn-success shadow-success btn-wave">Nouveaux</a>&nbsp;|&nbsp;<a href="Downloads/Popular" class="btn btn-warning shadow-warning btn-wave">Populaires</a>&nbsp;|&nbsp;<a href="Downloads/propose" class="btn btn-secondary shadow-secondary btn-wave">Proposer</a>&nbsp;<b>]</b></div>
</div>
<div class="card" style="width: 100%">
    <img src="<?=$screen;?>" class="card-img-top" alt="Screen <?=$data->name;?>">
    <div class="card-body">
        <h5 class="card-title text-center"><?=$data->name;?></h5>
        <p class="card-text"><?=$data->description;?></p>
    </div>
    <ul class="list-group list-group-flush belcms_groups_float_right">
        <li class="list-group-item"><strong>MD5 ::</strong> <span><?=$md5;?></span></li>
        <li class="list-group-item"><strong>Taille ::</strong> <span><?=$size;?></span></li>
        <li class="list-group-item"><strong>Compteur DL ::</strong> <span><?=$data->dls;?></span></li>
        <li class="list-group-item"><strong>Compteur vu ::</strong> <span><?=$data->view;?></span></li>
        <li class="list-group-item"><strong>Type Mime ::</strong> <span><?=$mime;?></span></li>
        <li class="list-group-item"><strong>Date de parution ::</strong> <span><?=Common::TransformDate($data->date, 'FULL', 'SHORT')?></span></li>
        <li class="list-group-item"><strong>Mise en ligne par ::</strong> <span><?=$author;?></span></li>
    </ul>
    <div class="card-footer">
        <div class="d-grid gap-2">
            <a href="Downloads/getDl/<?=$data->id?>?echo" target="_blank" class="btn btn-secondary">Télécharger</a>
        </div>
    </div>
</div>