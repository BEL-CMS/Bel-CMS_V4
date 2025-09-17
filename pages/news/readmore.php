<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
*/

use BelCMS\Core\Comment;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

    if (!empty($news->img)) {
        $img  = '<div class="belcms_news_img">';
        $img .= '<img src="'.$news->img.'">';
        $img .= '</div>';
    } else {
        $img = null;
    }
?>
<article class="belcms_news">
    <section class="belcms_news_content">
        <h1><?=$news->name;?></h1>
        <?=$img;?>
        <div class="belcms_new_detail">
            <ul>
                <li><i class="fa-solid fa-calendar-days"></i><?=Common::TransformDate($news->date_create, 'MEDIUM', 'SHORT');?></li>
                <li><i class="fa-solid fa-message"></i>0 Commentaires</li>
            </ul>
        </div>
        <div class="belcms_news_text">
        <?=$news->content;?>
        </div>
    </section>
</article>
<?php
$comments = new Comment;
$comments->html();
