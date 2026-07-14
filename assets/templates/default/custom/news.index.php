<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\Core\User;
use BelCMS\Requires\Common;

foreach ($news as $key => $data):
    if (User::ifUserExist($data->author)) {
        $user = User::getInfosUserAll($data->author);
        $username = $user->user->username;
        $avatar   = $user->profils->avatar;
    } else {
        $username = 'Inconnu';
        $avatar   = '/assets/img/avatar/dummy-avatar.jpg';
    }
?>
<div class="text-block">
    <?php
    if (!empty($data->img)):
    ?>
    <div class="blog-media">
        <div class="single-slider-wrap">
            <div class="single-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper lightgallery">
                        <div class="swiper-slide hov_zoom"><img src="<?= $data->img; ?>" alt="">
                            <a href="<?= $data->img; ?>" class="box-media-zoom popup-image"><i class="fal fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    endif;
    ?>
    <div class="text-block post-single_tb">
        <div class="text-block-container">
            <div class="tbc_subtitle"><a href="news/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>"><?= $data->name; ?></a></div>
            <div class="room-card-details" style="margin-bottom: 20px">
                <ul>
                    <li><i class="fa-light fa-calendar-days"></i><span><?=Common::transformDate($data->date_create, 'FULL', 'MEDIUM')?></span></li>
                    <li><i class="fa-light far fa-eye"></i><span><?=$data->view;?></span></li>
                </ul>
            </div>
            <?= $data->content; ?>
        </div>
        <div class="tbc-separator"></div>
        <?php
        if (!empty($data->tags)):
            if(strpos($data->tags, ',')) {
                $tags = null;
                $explodeTags = explode($data->tags, ',');
                echo '<div class="tagcloud tc_single">';
                foreach ($explodeTags as $key => $value) {
                    $tags .= '<a href="#">'.$value.'</a>';
                }
                echo '</div>';
            } else {
                $tags = '<a href="#" class="cat-opt">'.$tags.'</a>';
            }
        endif;
        ?>
    </div>
</div>
<?php
endforeach;