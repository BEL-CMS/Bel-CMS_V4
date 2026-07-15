<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

use BelCMS\Core\User;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
foreach ($news as $key => $data):

    if (!empty($data->img) and strpos($data->img, 'UPLOAD_NONE') == false) {
        $img = $data->img;

    $img = '<div class="post-item_media">
                <a href="'.$data->img.'" title="image -'.$data->name.'">
                    <img src="'.$data->img.'" alt="image -'.$data->name.'">
                </a>
            </div>';
    } else if ($data->img == '/uploads/news/UPLOAD_NONE') {
        $img = '';
    } else {
        $img = '';
    }

    if (User::ifUserExist($data->author)) {
        $user = User::getInfosUserAll($data->author);
        $username = $user->user->username;
        $avatar   = $user->profils->avatar;
    } else {
        $username = 'Inconnu';
        $avatar   = '/assets/img/avatar/dummy-avatar.jpg';
    }

    $sql = New BDD();
    $sql->table('TABLE_COMMENTS');

    $where[] = array('name' => 'page', 'value' => 'news');
    $where[] = array('name' => 'page_sub', 'value' => 'ReadMore');
    $where[] = array('name' => 'page_id', 'value' => $data->id);

    $sql->where($where);
    $sql->count();
    $returnCount = $sql->data;
    if ($returnCount == 1) {
        $s = '';
    } else {
        $s = 's';
    }
?>
<div class="post-item">
    <div class="post-item_wrap">
        <?= $img; ?>
        <div class="post-item_content">
            <h3><a href="news/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>"><?= $data->name; ?></a></h3>
            <p><?= Common::truncate_3($data->content, 240); ?></p>
            <div class="post-card-details">
                <ul>
                    <li><i class="fa-light fa-calendar-days"></i><span><?= Common::TransformDate($data->date_create, 'MEDIUM', 'MEDIUM'); ?></span></li>
                    <li><i class="fa-light fa-glasses"></i><span><?= $data->view; ?></span></li>
                </ul>
            </div>
            <a href="news/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>" class="post-card_link">Poursuivre la lecture <i class="fa-solid fa-caret-right"></i></a>
            <div class="pv-item_wrap"><i class="fa-light fa-comment"></i><span><strong><?= $returnCount; ?></strong> Commentaire<?= $s; ?></span></div>
        </div>
    </div>
</div>
<?php
endforeach;
echo $pagination;
?>