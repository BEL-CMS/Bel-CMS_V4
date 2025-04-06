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

foreach ($news as $key => $data):
?>
    <div class="card mb-4">
        <div class="card-header">
            <a href="news/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>"><img class="card-img-top" src="<?= $data->img; ?>" alt="First news" /></a>
        </div>
        <div class="card-body">
            <div class="small text-muted"><?= Common::TransformDate($data->date_create, 'MEDIUM', 'MEDIUM'); ?></div>
            <h2 class="card-title"><?= $data->name; ?></h2>
            <?php
            echo $data->content;
            ?>
            <a class="btn btn-primary" href="news/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>">Lire la suite →</a>
        </div>
    </div>
<?php
endforeach;
