<div class="gallery-items big-pad  two-column  fl-wrap">
<?php
use BelCMS\Core\Comment;
use BelCMS\Requires\Common;
use BelCMS\User\User;
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
		$img  = '<div class="grid-post-media fl-wrap">';
		$img .= '<a href="'.$v->img.'"><img  src="'.$v->img.'" alt="img_news"></a>';
		$img .= '<div class="post-det-num">01.</div>';
	} else {
		$img = '';
	}
	$v->content = Common::VarSecure($v->content, null);
?>
<div class="gallery-item">
	<div class="grid-item-holder hov_zoom">
		<?=$img;?>
		<div class="post-det fl-wrap">
			<h3><a href="<?=$v->link;?>"><?=$v->name;?></a></h3>
			<div class="post-header fl-wrap"> <span><?=Common::transformDate($v->date_create, 'MEDIUM', 'NONE')?></span>  <a href="#"><?=$comment;?></a></div>
			<?=Common::truncate($v->content, 300);?><br>
			<a href="<?=$v->link;?>" class="post-link">Lire la suite... <i class="fal fa-long-arrow-right"></i></a>
		</div>
	</div>
	<div class="pr-bg"></div>
</div>
<?php
endforeach;
?>
</div>