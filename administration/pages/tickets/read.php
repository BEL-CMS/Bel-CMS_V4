<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3">
                            <ul class="nav nav-tabs flex-column nav-style-4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" role="tab"
                                        aria-current="page" href="#home-vertical"
                                        aria-selected="true"><?= User::getNameForHash($origin->author); ?><span style="float: right;"> <?= Common::TransformDate($origin->date_post, 'FULL', 'MEDIUM'); ?></span></a>
                                </li>
                                <?php
                                foreach ($msg as $v):
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" role="tab"
                                            aria-current="page" href="#<?= $v->hashid; ?>"
                                            aria-selected="true"><?= User::getNameForHash($v->author); ?>
                                            <span style="float: right;"><?= Common::TransformDate($v->date_insert, 'FULL', 'MEDIUM'); ?></span>
                                        </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                        <div class="col-xl-9">
                            <div class="tab-content mt-2 mt-xl-0">
                                <div class="tab-pane show active text-muted" id="home-vertical"
                                    role="tabpanel">
                                    <?= $origin->content; ?>
                                </div>
                                <?php
                                foreach ($msg as $v):
                                ?>
                                    <div class="tab-pane text-muted" id="<?= $v->hashid; ?>"
                                        role="tabpanel">
                                        <?= $v->content; ?>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form method="post" action="tickets/reply?Admin&option=pages">
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="content"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $origin->hash; ?>">
                            <button type="submit" class="btn btn-orange-gradient btn-wave">Répondre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>