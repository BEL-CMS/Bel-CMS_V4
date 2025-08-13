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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="belcms_container">
    <div class="belcms_searchbox">
      <input type="text" id="belcms_search" placeholder="Rechercher une catégorie...">
    </div>
    <div class="belcms_separator"></div>
    <div class="belcms_categories">
    <?php
    foreach ($cat as $value):
    $name = Common::removeBlank($value->name);
    ?>
    <a href="downloads/viewcat/<?= $value->id_groups; ?>" class="belcms_category">
        <i class="<?= $value->ico; ?>"></i>
        <h4><?= $name; ?></h4>
    </a>
    <?php
    endforeach;
    ?>
    </div>
    <p id="belcms_category_count">Nombre de catégories : 4</p>
</div>