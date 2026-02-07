<?php
use BelCMS\Core\User;
if (is_file('assets/templates/default/config/config.tpl.php')) {
    require_once 'assets/templates/default/config/config.tpl.php';
};
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
	<!--
        /*
        ###################################################################
        ###################################################################
        ##                                                               ##
        ##                          Bel-CMS.dev                          ##
        ##                      Bel-CMS Version 4.0.0                    ##
        ##                  Systeme de gestion de contenue               ##
        ##                            PHP 8.4                            ##
        ##                  Copyright 2014-2026 by Bel-CMS               ##
        ##                 Développement par : Determe Stive             ##
        ##                                                               ##
        ###################################################################
        ###################################################################
        */
    -->
        <base href="<?= $this->host; ?>">
        <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - <?=$this->link;?></title>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
  	    <meta name="description" content="<?= $this->description; ?>">
  	    <meta name="keywords" content="<?= $this->keywords; ?>">
        <meta property="og:site_name" content="<?= $_SESSION['CONFIG']['CMS_NAME']; ?>">
        <meta property="og:title" content="<?= $_SESSION['CONFIG']['CMS_NAME']; ?>">
        <meta property="og:type" content="website">
        <?php echo $this->css; ?>
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/style.css">
        <link rel="shortcut icon" href="assets/templates/default/images/favicon.ico">
        <link type="text/plain" rel="author" href="assets/templates/default/humans.txt">
        <?php echo $this->custom_tpl; ?>
    </head>
    <body>
        <div class="loader-wrap">
            <div class="loader_inner">
                <div class="loader">
                    <div class="roller"></div>
                    <div class="roller"></div>
                </div>
                <div class="loader loader-2">
                    <div class="roller"></div>
                    <div class="roller"></div>
                </div>
                <div class="loader loader-3">
                    <div class="roller"></div>
                    <div class="roller"></div>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="main-header">
                <div class="container">
                    <div class="header-top  fl-wrap">
                        <div class="header-top_news">
                            <div class="acme-news-ticker-label">Message important</div>
                            <div class="acme-news-ticker">
                                <ul class="my-news-ticker-2">
                                    <?php
                                    foreach ($defilement['defilement'] as $key => $value):
                                        echo $value;
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                            <div class="acme-news-ticker-controls acme-news-ticker-horizontal-controls">
                                <span class="acme-news-ticker-pause"><i class="fa-solid fa-play-pause"></i></span>
                            </div>
                        </div>
                        <div class="header-social">
                            <div class="header-social_title">Suivez-nous :</div>
                            <ul>
                                <li><a href="<?= $social['facebook']; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="<?= $social['twitter']; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="<?= $social['instagram']; ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="<?= $social['discord']; ?>" target="_blank"><i class="fa-brands fa-discord"></i></a></li>
                            </ul>
                        </div>
                        <div class="lang-wrap"><a href="#">En</a><span>/</span><a class="act-lang" href="#">Fr</a></div>
                    </div>
                    <div class="header-inner init-fix-header">
                        <a href="index.php" class="logo-holder"><img src="<?= $logo['logo']; ?>" alt="Logo"></a>
                        <div class="nav-holder main-menu">
                            <nav>
                                <ul class="no-list-style">
                                    <li>
                                        <a href="index.php">Accueil</a>
                                    </li>
                                    <li>
                                        <a href="Forum">Forum</a>
                                    </li>
                                    <li>
                                        <a href="#">Pages <i class="fa-solid fa-caret-down"></i></a>
                                        <ul>
                                        <?php
                                        foreach ($menu['submenu'] as $key => $value):
                                            echo $value;
                                        endforeach;
                                        ?>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="nav-button-wrap">
                            <div class="nav-button">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <?php $isLoguer = User::isLogged() ? true : false;
				        if ($isLoguer !== true):
                        ?>
                        <a href="user" class="show-reg-form"><i class="fa-thin fa-user"></i><span>Log-In</span></a>
                        <?php
                        else:
                        ?>
                        <a href="user" class="show-reg-form"><i class="fa-thin fa-user"></i><span>Profil</span></a>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </header>
            <div class="wrapper">
                <div class="content">
                    <div class="section hero-section hero-section_sin">
                        <div class="hero-section-wrap">
                            <div class="hero-section-wrap-item">
                                <div class="container">
                                    <div class="hero-section-container">
                                        <div class="hero-section-title">
                                            <h2><?=$this->link;?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="hs-scroll-down-wrap">
                                    <div class="scroll-down-item">
                                        <div class="mousey">
                                            <div class="scroller"></div>
                                        </div>
                                        <span>Scroll</span>
                                    </div>
                                </div>
                                <div class="bg-wrap bg-hero bg-parallax-wrap-gradien fs-wrapper" data-scrollax-parent="true">
                                    <div class="bg" data-bg="<?= $headerBg['background']; ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                                </div>
                            </div>
                            <div class="dec-corner dc_lb"></div>
                            <div class="dec-corner dc_rb"></div>
                            <div class="dec-corner dc_rt"></div>
                            <div class="dec-corner dc_lt"></div>
                        </div>
                    </div>
                    <div class="content_wrap">
                        <div class="container">
                            <div class="breadcrumbs-list bl_flat">
                                <a href="index.php">Home</a><a href="<?=$this->link;?>"><?=$this->link;?></a>
                                <div class="breadcrumbs-list_dec"><i class="fa-solid fa-link-horizontal"></i></div>
                            </div>
                            <div class="main-content">
                                <div class="boxed-container">
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="post-container">
                                                    <?php
                                                    if (isset($var->widgets['top'])):
                                                        foreach ($var->widgets['top'] as $title => $content):
                                                          echo $content['view'];
                                                        endforeach;
                                                    endif;
                                                    echo $this->page;
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="sb-container fixed-bar">
                                                    <?php
                                                    if (isset($var->widgets['left'])):
                                                        foreach ($var->widgets['left'] as $title => $content):
                                                        ?>
                                                        <div class="boxed-content">
                                                            <div class="boxed-content-item bc-item_smal_pad">
                                                                <?php
                                                                echo $content['view'];
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="limit-box"></div>
                                </div>
                            </div>
                        </div>
                        <div class="content-dec_ver"></div>
                        <div class="content-dec_hor"></div>
                    </div>
                </div>
                <div class="height-emulator"></div>
                <footer class="main-footer">
                    <div class="container">
                        <div class="footer-inner">
                            <div class="subscribe-wrap-inner">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="subscribe-header">
                                            <h3>Abonnez-vous à notre newsletter</h3>
                                            <p>Vous souhaitez être informé(e) lors du lancement d'un nouveau produit ou d'une mise à jour ? Inscrivez-vous et nous vous enverrons une notification par e-mail..</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-5">
                                        <div class="footer-widget fl-wrap">
                                            <div class="subscribe-widget fl-wrap">
                                                <div class="subcribe-form">
                                                    <form id="subscribe"   class="subscribe-item">
                                                        <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                                                        <button type="submit" id="subscribe-button" class="subscribe-button"><span>Send</span> </button>
                                                        <label for="subscribe-email" class="subscribe-message"></label>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="footer-widget  ">
                                        <div class="footer-widget-logo fl-wrap  ">
                                            <img src="assets/templates/images/logo2.png" alt="">
                                        </div>
                                        <p><?= $footer['message_left']; ?></p>
                                        <div class="footer-social-wrap">
                                            <a href="<?= $social['facebook']; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="<?= $social['twitter']; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                            <a href="<?= $social['instagram']; ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                            <a href="<?= $social['discord']; ?>" target="_blank"><i class="fa-brands fa-discord"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Lien rapide</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box  ">
                                                <ul>
                                                    <?php
                                                    foreach ($footer['submenu'] as $key => $value):
                                                        echo $value;
                                                    endforeach;
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Contact</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box">
                                                <ul  class="footer-contacts ">
                                                    <?php
                                                    foreach ($footer['contact'] as $key => $value):
                                                        echo $value;
                                                    endforeach;
                                                    ?>
                                                </ul>
                                                <?= $footer['buttonContact']; ?>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title"><?= $footer['title']; ?></div>
                                        <div class="footer-widget-content">
                                            <p><?= $footer['application']; ?></p>
                                            <div class="api-links-wrap">
                                                <a href="#" class="footer-widget-content-link"><span> <?= $footer['textapp']; ?></span><i class="fa-brands fa-apple"></i></a>
                                                <a href="#" class="footer-widget-content-link"><span> <?= $footer['textapp2']; ?></span><i class="fa-brands fa-google-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom">
                            <a href="index.html" class="footer-home_link"><i class="fa-light fa-house-window"></i></a>		
                            <div class="copyright"> <span>&#169; <a style="color:red" href="https://bel-cms.dev" title="Bel-CMS">Bel-CMS 2025</a></span> . All rights reserved. </div>
                            <div class="subfooter-nav">
                                <ul class="no-list-style">
                                    <li><a>Page générée en <span class="belcms_genered"></span> secondes.</a></li>
                                </ul>
                            </div>
                            <a class="to-top"><i class="fas fa-caret-up"></i></a>
                        </div>
                    </div>
                    <div class="footer-dec"></div>
                </footer>
            </div>
            <div class="mob-nav-overlay fs-wrapper"></div>
            <div class="progress-bar-wrap">
                <div class="progress-bar color-bg"></div>
            </div>
        </div>
         <?=$this->js;?>
        <script  src="assets/templates/default/js/jquery.min.js"></script>
        <script  src="assets/templates/default/js/plugins.js"></script>
        <script  src="assets/templates/default/js/scripts.js"></script>
        <div id="endloading" style="display: none;">
        <?php
        $time = (microtime(true) - $_SESSION['SESSION_START']);
        echo round($time, 3);?>
        </div>
        <script type='text/javascript'>
            $(window).on("load", function () {
                var endloading = $('#endloading').text();
                $('.belcms_genered').append(endloading);
            });
        </script>
    </body>
</html>