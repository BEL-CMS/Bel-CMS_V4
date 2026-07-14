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

    $img = '    <div class="post-media">
                    <div class="single-slider-holder">
                        <div class="single-slider">
                            <div class="item">
                                <img src="'.$img.'" class="respimg pr-img" alt="image '.$data->name.'">
                            </div>
                        </div>
                    </div>
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
?>

<article class="post">
    <?= $img; ?>
    <h4 class="post-title"><a href="bnews/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>"><?= $data->name; ?></a></h4>
    <ul class="post-meta">
        <li><?= Common::TransformDate($data->date_create, 'MEDIUM', 'MEDIUM'); ?></li>
        <li><?= $returnCount; ?> commentaire</li>
        <li>
            <h5>Posted par <a href="Members/detail/<?= $username; ?>"><?= $username; ?></a></h5>
        </li>
    </ul>
    <?= $data->content; ?>
    <a href="bnews/ReadMore/<?= $data->id; ?>/<?= $data->rewrite_name; ?>"  class="btn ajax  hide-icon"><i class="fa fa-angle-right"></i><span>>Poursuivre la lecture</span></a>
</article>
<?php
endforeach;
echo $pagination;
?>