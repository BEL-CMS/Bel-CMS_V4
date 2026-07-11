<?php
$link = defined(strtoupper($this->link)) ? constant(strtoupper($this->link)) : $this->link;
$array = array(
    'Accueil' => 'index.php',
    'Actualités' => 'news',
    'Forum' => 'forum',
    'Pages' => array(
        'Livre d\'or' => 'guestbook',
        'Nos liens' => 'links',
        'Galerie d\'images' => 'Gallery',
    )
);
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['CONFIG']['CMS_WEBSITE_LANG']; ?>">
<head>
    <base href="<?=$this->host;?>">
    <meta charset="utf-8">
    <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - <?= $link; ?></title>
    <meta name="description" content="<?= $this->description; ?>">
    <meta name="author" content="Bel-CMS">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="<?= $this->keywords; ?>">
    <?= $this->css; ?>
    <link rel="stylesheet" href="assets/templates/default/style.css">
    <link rel="stylesheet" href="assets/templates/default/css/skins/green.css">
    <link rel="stylesheet" href="assets/templates/default/css/responsive.css">
    <link rel="shortcut icon" href="assets/templates/default/images/favicon.png">
</head>
<body onload="Launch();">
<div class="loader"><div class="loader_html"></div></div>
<div id="wrap" class="grid_1200">
    <div id="header-top">
        <section class="container clearfix">
            <nav class="header-top-nav">
                <ul>
                    <li><a href="mailto:contact@bel-cms.devl"><i class="icon-envelope"></i>Contact</a></li>
                    <li><a href="user/login?echo" id="login-panel"><i class="icon-user"></i>Login Area</a></li>
                </ul>
            </nav>
            <div class="header-search">
                <div id="localtime"></div>
            </div>
        </section>
    </div>
    <header id="header">
        <section class="container clearfix">
            <div class="logo"><a href="index.php"><img alt="" src="templates/default/images/logo.png" style="height: 60px;"></a></div>
            <?= include 'menu.php'; ?>
        </section><!-- End container -->
    </header><!-- End header -->
    
    <div class="breadcrumbs">
        <section class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?= $this->link; ?></h1>
                </div>
                <div class="col-md-12">
                    <div class="crumbs">
                        <a href="index.php">Home</a>
                        <span class="crumbs-span">/</span>
                        <span class="current"><?= $this->link; ?></span>
                    </div>
                </div>
            </div><!-- End row -->
        </section><!-- End container -->
    </div><!-- End breadcrumbs -->
    
    <section class="container main-content">
        <div class="row">
            <?php
            if (strtolower($this->link) == 'news' and strtolower($this->view) != 'readmore'):
            ?>
            <div class="col-md-9">
            <?php 
            echo $this->page;
            ?>
            </div>
            <aside class="col-md-3 sidebar"> 
            <?php
            foreach ($this->widgets['right'] as $key => $value):
                echo $value['view'];
            endforeach;
            ?>  
            </aside>
            <?php
            else:
            ?>
            <div class="col-md-12">
                <div class="page-content">
            <?php 
            echo $this->page;
            ?>
                </div>
            </div>
            <?php
            endif;
            ?>
        </div>
    </section>
    
    <footer id="footer">
        <section class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget widget_contact">
                        <ul>
                            <li>
                                <span>Adresse :</span>
                                Belgique
                            </li>
                            <li>
                                <span>Support :</span>Support Telephone No : (+32)0455.xx.xx.xx
                            </li>
                            <li>Support Email : contact@bel-cms.dev</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="widget">
                        <h3 class="widget_title">Quick Links</h3>
                        <ul>
                            <li><a href="RGPD">RGPD</a></li>
                            <li><a href="Cookiel">Cookiel</a></li>
                            <li><a href="Terms of Usel">Terms of Usel</a></li>
                            <li><a href="CGU">CGU</a></li>
                            <li><a href="FAQs">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <h3 class="widget_title">Popular Questions</h3>
                        <ul class="related-posts">
                            <li class="related-item">
                                <h3><a href="#">This is my first Question</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam.</p>
                                <div class="clear"></div><span>Feb 22, 2014</span>
                            </li>
                            <li class="related-item">
                                <h3><a href="#">This Is My Second Poll Question</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam.</p>
                                <div class="clear"></div><span>Feb 22, 2014</span>
                            </li>
                        </ul>
                    </div>	
                </div>
                <div class="col-md-3">
                    <div class="widget widget_twitter">
                        <h3 class="widget_title">Latest Tweets</h3>
                        <div class="tweet_1"></div>
                    </div>
                </div>
            </div><!-- End row -->
        </section><!-- End container -->
    </footer><!-- End footer -->
    <footer id="footer-bottom">
        <section class="container">
            <div class="copyrights f_left">Copyright <?= date('Y'); ?>  | <a href="https://www.bel-cms.dev" title="Bel-CMS" target="_blank">Bel-CMS</a></div>
            <div class="social_icons f_right">
                <ul>
                    <li class="twitter"><a original-title="Twitter" class="tooltip-n" href="#"><i class="social_icon-twitter font17"></i></a></li>
                    <li class="facebook"><a original-title="Facebook" class="tooltip-n" href="#"><i class="social_icon-facebook font17"></i></a></li>
                    <li class="gplus"><a original-title="Google plus" class="tooltip-n" href="#"><i class="social_icon-gplus font17"></i></a></li>
                    <li class="youtube"><a original-title="Youtube" class="tooltip-n" href="#"><i class="social_icon-youtube font17"></i></a></li>
                    <li class="skype"><a original-title="Skype" class="tooltip-n" href="skype:#?call"><i class="social_icon-skype font17"></i></a></li>
                    <li class="flickr"><a original-title="Flickr" class="tooltip-n" href="#"><i class="social_icon-flickr font17"></i></a></li>
                    <li class="rss"><a original-title="Rss" class="tooltip-n" href="#"><i class="social_icon-rss font17"></i></a></li>
                </ul>
            </div><!-- End social_icons -->
        </section><!-- End container -->
    </footer><!-- End footer-bottom -->
</div><!-- End wrap -->

<div class="go-up"><i class="icon-chevron-up"></i></div>
<div id="belcms-cookie-consent" class="belcms-cookie-hidden">
    <div class="belcms-cookie-box">
        <h3>🍪 Gestion des cookies</h3>
        <p>
            Nous utilisons des cookies nécessaires au fonctionnement du site
            ainsi que Google Analytics afin d'améliorer votre expérience
            et mesurer l'audience du site.
        </p>
        <div class="belcms-cookie-options">
            <label>
                <input type="checkbox" checked disabled>
                Cookies nécessaires (obligatoires)
            </label>

            <label>
                <input type="checkbox" id="analytics-consent">
                Google Analytics
            </label>
        </div>
        <div class="belcms-cookie-buttons">
            <button id="belcms-cookie-accept">
                Tout accepter
            </button>

            <button id="belcms-cookie-refuse">
                Tout refuser
            </button>

            <button id="belcms-cookie-save">
                Enregistrer
            </button>
        </div>
        <small>
            Consultez notre politique de confidentialité
            pour plus d'informations.
        </small>
    </div>
</div>
<?= $this->js; ?>
<script src="assets/templates/default/js/jquery.min.js"></script>
<script src="assets/templates/default/js/belcms.js"></script>
<script src="assets/templates/default/js/html5.js"></script>
<script src="assets/templates/default/js/jquery.scrollTo.js"></script>
<script src="assets/templates/default/js/jquery.nav.js"></script>
<script src="assets/templates/default/js/tags.js"></script>
<script src="assets/templates/default/js/custom.js"></script>
<!-- End js -->
<script type="text/javascript">
    jQuery(window).load(function() {
        $(".loader").fadeIn();
    });
</script>
<script type='text/javascript'>
    var TabMois=new Array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre') 
    var ComputerDate;
    function perpetualDate(){
    ComputerDate=new Date();
    var Annee=ComputerDate.getUTCFullYear();
    var Jour=ComputerDate.getUTCDate();
    var Mois=ComputerDate.getUTCMonth();
    var Heure=ComputerDate.getUTCHours();
    var Minutes=ComputerDate.getUTCMinutes();
    Heure = Heure +2;
    Minutes = Minutes > 9 ? Minutes : '0' + Minutes;
    var Secondes=ComputerDate.getUTCSeconds();
        document.getElementById('localtime').innerHTML=Jour+' '+TabMois[Mois]+' '+Annee+',  '+Heure+'h '+Minutes+' et '+Secondes+' s';
    }
    function Launch(){
        setInterval(function(){perpetualDate()},1000);
    }
</script>
</body>
</html>