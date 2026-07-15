<?php
use BelCMS\Core\GetHost;
use BelCMS\Core\User;
use BelCMS\Requires\Common;
$link = defined(strtoupper($this->link)) ? constant(strtoupper($this->link)) : $this->link;
$nameLink = html_entity_decode($link, ENT_QUOTES | ENT_HTML5, 'UTF-8');
include 'config.php';
?>
<!DOCTYPE HTML>
<html lang="<?= $_SESSION['CONFIG']['CMS_WEBSITE_LANG']; ?>">
    <!--
        /*
        ###################################################################
        ###################################################################
        ##                                                               ##
        ##                             Bel-CMS                           ##
        ##                      Bel-CMS Version 4.1.1                    ##
        ##                  Systeme de gestion de contenue               ##
        ##                            PHP 8.5                            ##
        ##                  Copyright 2014-2026 by Bel-CMS               ##
        ##                 Développement par : Determe Stive             ##
        ##                                                               ##
        ###################################################################
        ###################################################################
        */
    -->
    <head>
        <base href="<?=GetHost::getBaseUrl();?>">
        <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - <?= Common::VarSecure($this->link); ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
  	    <meta name="description" content="<?= $this->description; ?>">
  	    <meta name="keywords" content="<?= $this->keywords; ?>">
        <meta property="og:site_name" content="<?= $_SESSION['CONFIG']['CMS_NAME']; ?>">
        <meta property="og:title" content="<?= $_SESSION['CONFIG']['CMS_NAME']; ?>">
        <meta property="og:type" content="website">
        <!--==========  css belcms ===============-->
        <?php echo $this->css; ?>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/style.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="assets/templates/default/images/favicon.ico">
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
                    <div class="header-top fl-wrap">
                        <div class="header-top_news">
                            <div class="acme-news-ticker-label">News importante !</div>
                            <div class="acme-news-ticker">
                                <ul class="my-news-ticker-2">
                                    <li><a href="post-single.html"><span><?= $config['message_animate_1']['date'] ?></span><?= $config['message_animate_1']['content'] ?></a></li>
                                    <li><a href="post-single.html"><span><?= $config['message_animate_2']['date'] ?></span><?= $config['message_animate_2']['content'] ?></a></li>
                                    <li><a href="post-single.html"><span><?= $config['message_animate_3']['date'] ?></span><?= $config['message_animate_3']['content'] ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-social">
                            <div class="header-social_title">Social Liens:</div>
                            <ul>
                                <li><a href="<?= $config['social_facebook']; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="<?= $config['social_x']; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="<?= $config['social_discord']; ?>" target="_blank"><i class="fa-brands fa-discord"></i></a></li>
                                <li><a href="<?= $config['tiktok']; ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                                <li><a href="<?= $config['youtube']; ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="lang-wrap"><span id="heure"></span></div>
                    </div>
                    <div class="header-inner init-fix-header">
                        <a href="index.php" class="logo-holder">
                            <img style="width: 110px;margin-top: -12px;height:auto;" src="<?= $config['logo']; ?>" alt="Logo - <?= $_SESSION['CONFIG']['CMS_NAME']; ?>">
                        </a>
                        <div class="nav-holder main-menu">
                            <?php include 'menu.php'; ?>
                        </div>
                        <div class="nav-button-wrap">
                            <div class="nav-button">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <?php
                        if (User::isLogged()) {
                            echo '<a href="user" title="profils" class="show-reg-form"><i class="fa-thin fa-user"></i><span>Profils</span></a>';
                        } else {
                            echo '<a href="user/login&echo" title="utilisateur login" class="show-reg-form"><i class="fa-thin fa-user"></i><span>Connexion</span></a>';
                        }
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
                                            <h2><?= $config['name_wel']; ?></h2>
                                            <h5><?= $config['sub_name']; ?></h5>
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
                                    <div class="bg" data-bg="<?= $config['background_link']; ?>" data-scrollax="properties: { translateY: '30%' }"></div>
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
                                <a href="index.php" title="Accueil">Home</a></a><span><?= $nameLink; ?></span>
                                <div class="breadcrumbs-list_dec"><i class="fa-solid fa-link-horizontal"></i></div>
                            </div>
                            <div class="main-content">
                                <div class="boxed-container">
                                    <div class="row">
                                        <?php if (strtolower($this->link) == 'news' and $this->fullwide == 0): ?>
                                        <div class="col-lg-8">
                                            <div class="post-container fix_bar_container_init">
                                                <div class="post-items">
                                                     <?php echo $this->page; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="sb-container fixed-bar">
                                                <?php
                                                foreach ($this->widgets['right'] as $key => $value):
                                                    echo $value['view'];
                                                endforeach;
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                        else:
                                            echo $this->page;
                                        endif;
                                        ?>
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
                                            <p>Vous souhaitez être informé(e) de la sortie d'une nouvelle mise à jour ? Inscrivez-vous et nous vous enverrons une notification par e-mail.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-5">
                                        <div class="footer-widget fl-wrap">
                                            <div class="subscribe-widget fl-wrap">
                                                <div class="subcribe-form">
                                                    <form id="subscribe" class="subscribe-item">
                                                        <input class="enteremail" name="email" id="subscribe-email" placeholder="e-mail" spellcheck="false" type="text">
                                                        <button type="submit" id="subscribe-button" class="subscribe-button"><span>Envoyer</span> </button>
                                                        <label for="subscribe-email" class="subscribe-message"></label>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="footer-widget">
                                        <p><?= $config['about']; ?></p>
                                        <div class="footer-social-wrap">
                                            <a href="<?= $config['social_facebook']; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a> 
                                            <a href="<?= $config['social_x']; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a> 
                                            <a href="<?= $config['social_discord']; ?>" target="_blank"><i class="fa-brands fa-discord"></i></a> 
                                            <a href="<?= $config['tiktok']; ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                            <a href="<?= $config['youtube']; ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Liens rapide</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box">
                                                <ul>
                                                    <li><a href="<?= $config['footer_link_1']['link']; ?>"><?= $config['footer_link_1']['name']; ?></a></li>
                                                    <li><a href="<?= $config['footer_link_2']['link']; ?>"><?= $config['footer_link_2']['name']; ?></a></li>
                                                    <li><a href="<?= $config['footer_link_3']['link']; ?>"><?= $config['footer_link_3']['name']; ?></a></li>
                                                    <li><a href="<?= $config['footer_link_4']['link']; ?>"><?= $config['footer_link_4']['name']; ?></a></li>
                                                    <li><a href="<?= $config['footer_link_5']['link']; ?>"><?= $config['footer_link_5']['name']; ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Contacts</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box">
                                                <ul  class="footer-contacts  ">
                                                    <li><span>E-mail :</span><a href="mailto:<?= $config['mail']; ?>" target="_blank"><?= $config['mail']; ?></a></li>
                                                    <li> <span>Adresse :</span><a href="#" target="_blank"><?= $config['country']; ?></a></li>
                                                    <li><span>Tel :</span><a href="tel:<?= $config['tel']; ?>"><?= $config['tel']; ?></a></li>
                                                </ul>
                                                <a href="contact" class="footer-widget-content-link"><span>Contact sur le site</span><i class="fa-solid fa-caret-right"></i></a>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="footer-widget">
                                        <div class="footer-list footer-box">
                                            <div class="fb-page" data-href="https://www.facebook.com/<?= $config['facebook']; ?>" data-tabs="timeline" data-width="400" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                                <blockquote cite="https://www.facebook.com/<?= $config['facebook']; ?>" class="fb-xfbml-parse-ignore">
                                                    <a href="https://www.facebook.com/<?= $config['facebook']; ?>">Bel-CMS</a>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom">
                            <a href="index.php" class="footer-home_link"><i class="fa-light fa-house-window"></i></a>
                            <div class="copyright"> <span>&#169;<?= $config['footer_name']; ?></span> . All rights reserved. by <span><a  style="color:#0d9762;" href="https://www.bel-cms.dev" title="Bel-CMS">Bel-CMS v4.1.1</a></span> </div>
                            <div class="subfooter-nav">
                                <ul class="no-list-style">
                                    <li><a href="<?= $config['link_roi']; ?>">R.O.I</a></li>
                                    <li><a href="<?= $config['rgpd']; ?>">RGPD</a></li>
                                    <li><a href="<?= $config['cookies']; ?>">Cookies</a></li>
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
        <?= $this->js; ?>
        <script  src="assets/templates/default/js/jquery.min.js"></script>
        <script  src="assets/templates/default/js/plugins.js"></script>
        <script  src="assets/templates/default/js/scripts.js"></script>
        <script>
            $(window).on("load", function () {
                    var endloading = $('#endloading').text();
            $('#belcms_genered').append(endloading);
                });
            function afficherHeure() {
                const maintenant = new Date();
            const heure = String(maintenant.getHours()).padStart(2, '0');
            const minute = String(maintenant.getMinutes()).padStart(2, '0');
            const seconde = String(maintenant.getSeconds()).padStart(2, '0');

            document.getElementById('heure').textContent =
            heure + ':' + minute + ':' + seconde;
            }
            setInterval(afficherHeure, 1000);
            afficherHeure();

        </script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v25.0&appId=<?= $config['facebook_api']; ?>"></script>
    </body>
</html>