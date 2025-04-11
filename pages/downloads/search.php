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
<section id="belcms_downloads">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-xsm-12">
                <div id="belcms_downloads_menu">
                    <form action="Downloads/Search" method="post">
                        <div class="card">
                            <div class="card-header title">Filtrer les résultats</div>
                            <label for="exampleDataList" class="form-label">Recherche</label>
                            <input minlength="3" placeholder="3 lettre minimum" id="belcms_search_title" name="name" class="form-select" type="serch" autocomplete="true">
                            <ul class="list-group list-group-flush">
                                <label class="SearchFilters-label" for="SearchFilters-Sort">Trier par</label>
                                <select class="form-select" name="sorting">
                                    <option value="1">a-Z</option>
                                    <option value="2">Tendance</option>
                                    <option value="3">Catégorie</option>
                                    <option value="4">Vu</option>
                                    <option value="5">Télécharger</option>
                                </select>
                            </ul>
                            <?php
                            if (!empty($cat)):
                            ?>
                                <ul class="list-group list-group-flush mb-1">
                                    <label class="SearchFilters-label" for="SearchFilters-Sort">Catégories</label>
                                    <select class="form-select" name="cat">
                                        <option value="0">Aucune</option>
                                        <?php
                                        foreach ($cat as $value):
                                        ?>
                                            <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </ul>
                            <?php
                            endif;
                            ?>
                            <input type="submit" value="Rechercher" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12 col-xsm-12">
                <div class="card">
                    <div class="card-header title">Résultats de la recherche</div>
                    <?php
                    foreach ($dls as $v):
                        $user  = User::ifUserExist($v->uploader) ? User::getInfosUserAll($v->uploader) : 'inconnu';
                        $username  = $user->user->username;
                        $color = $user->user->color;
                    ?>
                        <div class="belcms_content_search">
                            <h2><a href="Downloads/View/<?= $v->id; ?>/<?= $v->name; ?>" <?= $v->name; ?>><?= $v->name; ?></a></h2>
                            <?= $v->description; ?>
                            <span>Publié par : <i style="color:<?= $color; ?>"><?= $username; ?></i></span>
                            <div class="belcms_content_search_view"><i class="fa-regular fa-calendar-plus"></i> <?= Common::TransformDate($v->date, 'FULL', 'MEDIUM'); ?></div>
                            <a href="Downloads/View/<?= $v->id; ?>/<?= $v->name; ?>" class="btn btn-secondary">Voir +</a>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
</section>