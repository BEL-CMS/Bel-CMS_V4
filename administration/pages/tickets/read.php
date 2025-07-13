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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div id="belcms_links_menu" class="mb-2">
    <a class="active" href="Tickets" title="Lien"><i class="fa-solid fa-house"></i></a> | <a href="Tickets/send" title="Nouveau tickets"><i class="fa-solid fa-square-plus"></i></a>
</div>
<div class="accordion" id="accordionOrigin">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa-solid fa-user-tie"></i>&emsp;<?= User::getNameForHash($origin->author); ?> &emsp;- &emsp;<i class="fa-solid fa-clock"></i>&emsp;<?= Common::TransformDate($origin->date_post, 'FULL', 'MEDIUM'); ?>
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOrigin">
            <div class="accordion-body">
                <?= $origin->content; ?>
            </div>
        </div>
    </div>
    <?php
    foreach ($msg as $key => $value):
    ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa-solid fa-user-tie"></i> &emsp;<?= User::getNameForHash($value->author); ?> &emsp;- &emsp;<i class="fa-solid fa-clock"></i>&emsp;<?= Common::TransformDate($value->date_insert, 'FULL', 'MEDIUM'); ?>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?= $value->content; ?>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>