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
use BelCMS\Requires\Common;
?>
<div class="card mb-4">
    <a href="news/ReadMore/<?=$news->id;?>/<?=$news->rewrite_name;?>"><img class="card-img-top" src="<?=$news->img;?>" alt="First news" /></a>
    <div class="card-body">
        <div class="small text-muted"><?=Common::TransformDate($news->date_create, 'MEDIUM', 'MEDIUM');?></div>
        <h2 class="card-title"><?=$news->name;?></h2>
        <?php
        echo $news->content;
        ?>
        <a class="btn btn-primary" href="news/ReadMore/<?=$news->id;?>/<?=$news->rewrite_name;?>">Lire la suite →</a>
    </div>
</div>