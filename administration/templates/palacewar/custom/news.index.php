<?php

use BelCMS\Core\User;
use BelCMS\Requires\Common;

foreach ($news as $key => $data):
    if (User::ifUserExist($data->author)) {
        $username = User::getInfosUserAll($data->author);
        $username = $username->user->username;
    } else {
        $username = 'Inconnu';
    }
    if (!empty($data->img)) {
        $img = '<div class="blog-image image-scale-hover">
                    <a href="#">
                        <img src="' . $data->img . '" alt="Image ' . $data->name . '" class="-100">
                    </a>
                </div>';
    } else {
        $img = null;
    }

    if (!empty($data->tags)) {
        if(strpos($data->tags, ',')) {
        }
    }
?>
<div class="vs-blog">
    <?php echo $img; ?>
    <div class="blog-meta bg-smoke has-border">
        <a href="#"><i class="fal fa-calendar-alt"></i><?=Common::transformDate($data->date_create, 'FULL', 'MEDIUM')?></a>
        <a href="#"><i class="far fa-eye"></i><?=$data->view;?></a>
        <div class="cat-list">
            <i class="far fa-folder-open"></i>
            <?=$data->tags;?>
        </div>
    </div>
    <div class="blog-content bg-smoke">
        <h2 class="blog-title h4 font-theme "><a href="news/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>"><?= $data->name; ?></a></h2>
        <?= $data->content; ?>
    </div>
</div>
<?php
endforeach;