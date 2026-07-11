<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
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
    } else if ($data->img == '/uploads/news/UPLOAD_NONE') {
        $img = 'assets/img/no-image-png.png';
    } else {
        $img = 'assets/img/no-image-png.png';
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
?>
<article class="post clearfix">
    <div class="post-inner">
        <div class="post-img"><a href="<?= $img; ?>"><img src="<?= $img; ?>" alt="image - <?= $data->rewrite_name; ?>"></a></div>
        <h2 class="post-title"><a href="news/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>"><?= $data->name; ?></a></h2>
        <div class="post-meta">
            <span class="meta-author"><i class="fa-solid fa-user"></i><a href="#"><?= $username; ?></a></span>
            <span class="meta-date"><i class="fa-solid fa-calendar-days"></i><?= Common::TransformDate($data->date_create, 'MEDIUM', 'MEDIUM'); ?></span>
            <span class="meta-comment"><i class="fa-regular fa-comment-dots"></i><a href="#"><?= $returnCount; ?> commentaires</a></span>
        </div>
        <div class="post-content">
            <?= $data->content; ?>
            <a href="news/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>" class="post-read-more button color small">Poursuivre la lecture</a>
        </div>
    </div>
</article>
<?php
endforeach;
echo $pagination;
?>