<?php
use BelCMS\Core\Comment;
use BelCMS\Core\User;
use BelCMS\Requires\Common;
foreach ($news as $k => $v):
	$countComment = Comment::countComments('news', $v->id);
	if ($countComment == 0) {
		$comment                = constant('NO_COMMENT');
		$c_comment              = constant('NO_COMMENT');
		} else if($countComment == 1) {
		$comment                = '1 '.constant('COMMENT');
		$c_comment              = constant('COMMENT');
		} else {
		$comment                = $countComment.' '.constant('COMMENTS');
		$c_comment              = constant('COMMENTS');
	}
	$user = User::getInfosUserAll($v->author);
	if (!$user) {
		$username = constant('MEMBER_DELETE');
		$avatar   = constant('DEFAULT_AVATAR');
	} else {
		$username = $user->user->username;
		$avatar   = !empty($user->profils->avatar) ? $user->profils->avatar : constant('DEFAULT_AVATAR');
	}
	if (!empty($v->img)) {
		$img  = '<div class="post-media">';
		$img .= '<img src="'.$v->img.'" class="respimg pr-img" alt="">';
		$img .= '</div>';
	} else {
		$img = '';
	}
	$v->content = Common::VarSecure($v->content, null);
?>
<article class="post">
    <?=$img;?>
    <h4 class="post-title"><a href="<?=$v->link;?>"><?=$v->name;?></a></h4>
    <ul class="post-meta">
        <li><?=Common::transformDate($v->date_create, 'MEDIUM', 'NONE')?></li>
        <li><?=$comment;?></li>
        <li><i class="fa-solid fa-eye"></i> <?=$v->view;?></li>
        <li>
            <h5>Posted by <a href="#"><?=$username;?></a></h5>
        </li>
    </ul>
    <?=$v->content;?>
    <a href="<?=$v->link;?>" class="btn ajax  hide-icon"><i class="fa fa-angle-right"></i><span>Lire la suite...</span></a>
</article>
<?php
endforeach;