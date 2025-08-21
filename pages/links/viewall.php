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
<section id="belcms_links">
    <div class="container">
        <div class="row">
            <a style="color: red;" href="links/propose">* Proposé</a>
            <div class="col-lg-12 col-sm-12 col-xsm-12 belcms_links_block">
                <div class="card" style="width: 100%;">
                <div class="card-header" style="color: <?=$cat->color;?>;font-weight: bold;"><?=$cat->name;?></div>
                <ul class="list-group list-group-flush">
                <?php
                foreach ($links as $value):
                ?>
                    <li class="list-group-item">
                        <a href="links/view/<?= $value->id; ?>"><?=$value->name;?></a>
                        <div class="list-group-item_right"><i class="fa-solid fa-computer-mouse"></i> <?= $value->click; ?></div>
                        <div class="list-group-item_right"><i class="fa-solid fa-users-viewfinder"></i> <?= $value->view; ?></div>
                    </li>
                <?php
                endforeach;
                ?>
                </ul>
                </div>
            </div>
        </div>
    </div>
</section>