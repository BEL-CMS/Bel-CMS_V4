<div id="wrapper">
    <?php include 'menu.php'; ?>
    <div class="content full-height" data-pagetitle="<?=$this->link;?>">
        <div class="video-holder-wrap hero_entry">
            <div class="media-container">
                <div class="video-container">
                    <video playsinline autoplay loop muted class="bgvid">
                        <source src="templates/zonar/video/1.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="overlay"></div>
            <div class="half-hero-wrap hhw-vis">
                <div class="hhw_header">
                    <div class="rotate_text hero-decor-let">
                        <div>Dévelopement</div>
                        <div><span>Design Bootstrap</span></div>
                        <div>mail privé</div>
                        <div><span>Ecommerce</span></div>
                    </div>
                </div>
                <h1>Bel-CMS  - <br><span> Web  developer</span> and designer<br>   form <span>Belgium</span></h1>
                <h4>Le C.M.S a été conçu sans aucun framework, par contre, j'utilise le jQuery, jQuery IU, TinyMCE.</h4>
                <div class="clearfix"></div>
                <a href="News" class="btn fl-btn color-bg"><span>Enter sur le site</span></a>
            </div>
            <div class="hero-facts-wrap">
                <div class="inline-facts">
                    <div class="milestone-counter">
                        <div class="stats animaper">
                            <div class="num" data-content="0" data-num="<?=getNbPageView();?>">0</div>
                        </div>
                    </div>
                    <h6>Nombre de pages visité</h6>
                </div>
                <div class="inline-facts">
                    <div class="milestone-counter">
                        <div class="stats animaper">
                            <div class="num" data-content="0" data-num="<?=getNbDL();?>">0</div>
                        </div>
                    </div>
                    <h6>Téléchargements</h6>
                </div>
                <div class="inline-facts">
                    <div class="milestone-counter">
                        <div class="stats animaper">
                            <div class="num" data-content="0" data-num="<?=getNbNews();?>">0</div>
                        </div>
                    </div>
                    <h6>Nombre d'articles</h6>
                </div>
            </div>
            <div class="hero-decor-numb hdn2"><span>50.43440605746678  </span><span>4.551550817524646 </span> <a href="https://www.google.com.ua/maps/" target="_blank" class="hero-decor-numb-tooltip">Based In Belgium</a></div>
        </div>
    </div>
    <div class="share-wrapper">
        <div class="close-share-btn"><i class="fal fa-long-arrow-left"></i></div>
        <div class="share-container fl-wrap isShare"></div>
    </div>
</div>
<?php
use BelCMS\PDO\BDD;
function getNbDL()
{
	$count = 0;
	$sql = New BDD();
	$sql->table('TABLE_DOWNLOADS');
	$sql->queryAll();
	foreach ($sql->data as $view) {
        $count += $view->dls;
     }
     return $count;
}
function getNbNews()
{
	$result = 0;
	$sql = New BDD();
	$sql->table('TABLE_NEWS');
	$sql->count();
	return $sql->data;
}
function getNbPageView()
{
	$count = (int) 0;
	$sql = New BDD();
	$sql->table('TABLE_PAGES_STATS');
	$sql->fields('nb_view');
	$sql->queryAll();

	foreach ($sql->data as $key => $view) {
	   $count += $view->nb_view;
	}
	return $count;
}
?>