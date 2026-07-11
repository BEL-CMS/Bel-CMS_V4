<?php

use BelCMS\Core\Dispatcher;
use BelCMS\Core\Notification;
use BelCMS\Core\User;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

    if (User::ifUserExist($news->author)) {
        $user = User::getInfosUserAll($news->author);
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
    $where[] = array('name' => 'page_id', 'value' => $news->id);

    $sql->where($where);
    $sql->count();
    $returnCount = $sql->data;

    $message = getMessage();

	function getDataUser ($hash_key = null)
	{
		if ($hash_key AND strlen($hash_key) == 32) {
			$user = User::getInfosUserAll($hash_key);
			if ($user) {
				$return['username'] = $user->user->username;
				$return['avatar']   = $user->profils->avatar;
			} else {
				$return['username'] = constant('MEMBER_DELETE');
				$return['avatar']   = constant('DEFAULT_AVATAR');
			}
			$return = (object) $return;
		}
		return $return;
	}

	function getMessage ()
	{
		$dispatcher = new Dispatcher();
		$dispatcher->link;
		$dispatcher->link[0] = Common::VarSecure($dispatcher->link[0]);
		$dispatcher->link[1] = Common::VarSecure($dispatcher->link[1]);
		$dispatcher->link[2] = (int) $dispatcher->link[2];
		$sql = New BDD;
		$sql->table('TABLE_COMMENTS');
		$where[] = array('name' => 'page', 'value' => $dispatcher->link[0]);
		$where[] = array('name' => 'page_sub', 'value' => $dispatcher->link[1]);
		$where[] = array('name' => 'page_id', 'value' => $dispatcher->link[2]);
		$sql->limit(5);
		$sql->where($where);
		$sql->queryAll();

		foreach ($sql->data as $k => $v) {
			$sql->data[$k]->user = getDataUser($v->hash_key);
		}
		return $sql->data;
	}

	function countComment ()
	{
		$dispatcher = new Dispatcher();
		$dispatcher->link;
		$dispatcher->link[0] = Common::VarSecure($dispatcher->link[0]);
		$dispatcher->link[1] = Common::VarSecure($dispatcher->link[1]);
		$dispatcher->link[2] = (int) $dispatcher->link[2];
		$sql = New BDD;
		$sql->table('TABLE_COMMENTS');
		$where[] = array('name' => 'page', 'value' => $dispatcher->link[0]);
		$where[] = array('name' => 'page_sub', 'value' => $dispatcher->link[1]);
		$where[] = array('name' => 'page_id', 'value' => $dispatcher->link[2]);
        $sql->where($where);
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    if (countComment() == 0) {
        $count = 0;
        $s = '';
    } else {
        $count = countComment();
        $s = 's';
    }
    if (countComment() == 1) {
        $s = '';
    }
?>
<article class="post single-post clearfix">
    <div class="post-inner">
        <h2 class="post-title"><span class="post-type"><i class="fa-brands fa-readme"></i></span><?=$news->name;?></h2>
            <div class="post-meta">
                <span class="meta-author"><i class="fa-solid fa-user"></i><a href="#"><?= $username; ?></a></span>
                <span class="meta-date"><i class="fa-solid fa-calendar-days"></i><?= Common::TransformDate($news->date_create, 'MEDIUM', 'MEDIUM'); ?></span>
                <span class="meta-comment"><i class="fa-regular fa-comment-dots"></i><a href="#"><?= $returnCount; ?> commentaire<?= $s; ?></a></span>
            </div>
        <div class="post-content">
            <?= $news->content; ?>
        </div>
        <div class="clearfix"></div>
    </div>
</article>

<div id="commentlist" class="page-content" style="height: auto;">
    <div class="boxedtitle page-title"><h2>Commentaire<?= $s; ?> (<span class="color"><?= $returnCount; ?></span>)</h2></div>
    <ol class="commentlist clearfix">
        <?php
        foreach ($message as $k => $v):
        ?>
        <li class="comment">
            <div class="comment-body clearfix"> 
                <div class="avatar"><img alt="" src="<?= $v->user->avatar; ?>"></div>
                <div class="comment-text">
                    <div class="author clearfix">
                        <div class="comment-meta">
                            <span><?= $v->user->username; ?></span>
                            <div class="date"><?= Common::TransformDate($v->date_com, 'MEDIUM', 'MEDIUM'); ?></div> 
                        </div>
                    </div>
                    <div class="text"><?= $v->comment; ?></div>
                </div>
            </div>
        </li>
        <?php
        endforeach;
        ?>
    </ol>
</div>

<?php
if (User::isLogged() === true):
    $dispatcher = new Dispatcher();
    $dispatcher->link;
    $links = $dispatcher->link[0].'/'.$dispatcher->link[1].'/'.$dispatcher->link[2];
?>
<div id="respond" class="comment-respond page-content clearfix" style="height: auto;">
    <div class="boxedtitle page-title"><h2>Laisser un commentaire</h2></div>
    <form action="comments/send" method="post" id="commentform" class="comment-form">
        <div id="respond-inputs" class="clearfix">
            <p>
                <label class="required" for="comment_name">Nom<span>*</span></label>
                <input type="text" value="<?= $_SESSION['USER']->user->username; ?>" id="comment_name" aria-required="true" readonly>
            </p>
            <p>
                <label class="required" for="comment_email">E-Mail<span>*</span></label>
                <input type="email" value="<?= $_SESSION['USER']->user->mail; ?>" id="comment_email" aria-required="true" readonly>
            </p>
        </div>
        <div id="respond-textarea">
            <p>
                <label class="required" for="comment">Commentaire<span>*</span></label>
                <textarea id="comment" name="text" aria-required="true" cols="58" rows="10"></textarea>
            </p>
        </div>
        <p class="form-submit">
            <input name="url" type="hidden" value="<?=$links; ?>">
            <input type="submit" id="submit" value="Poster le commentaire" class="button small color">
        </p>
    </form>
</div>
<?php
else:
    Notification::infos('Pour pouvoir laisser un commentaire, vous devez vous connecter au site. <a href="user/loign&echo" title="Connexion">Connexion ici</a>', 'Commentaire');
endif;
?>