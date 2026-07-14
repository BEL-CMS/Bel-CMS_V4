<?php
use BelCMS\Core\GetHost;
use BelCMS\Requires\Common;
include 'config.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
    <!--
        /*
        ###################################################################
        ###################################################################
        ##                                                               ##
        ##                           Bel-CMS                             ##
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
        <?php echo $this->css; ?>
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/style.css">
        <link rel="shortcut icon" href="assets/templates/default/images/favicon.ico">
    </head>
    <body>
        <div class="loader-wrap">
            <div class="loader-item">
                <div class="cd-loader-layer" data-frame="25">
                    <div class="loader-layer"></div>
                </div>
                <span class="loader"><i class="fa-solid <?= $config['loader']; ?>"></i></span>
            </div>
        </div>
        <div id="main">
            <header class="main-header">
                <div class="container">
                    <div class="header-top  fl-wrap">
                        <div class="header-top_contacts"><a href="https://wa.me/<?= $config['whatsapp']; ?>"><span>Whatsapp:</span><?= $config['whatsapp']; ?></a></div>
                        <div class="header-social">
                            <ul>
                                <li><a href="<?= $config['social_facebook']; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="<?= $config['social_x']; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="<?= $config['social_web']; ?>" target="_blank"><i class="fa-brands fa-angellist"></i></a></li>
                                <li><a href="<?= $config['social_discord']; ?>" target="_blank"><i class="fa-brands fa-discord"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-holder-wrap init-fix-header  fl-wrap">
                        <a href="index.html" class="logo-holder"><img src="<?= $config['logo']; ?>" alt="Logo"></a>
                        <div class="nav-holder main-menu">
                            <?php include 'menu.php'; ?>
                        </div>
                        <div class="serach-header-btn_wrap">
                            <a href="search" class="serach-header-btn"><i class="fa-solid fa-magnifying-glass"></i> <span>Recherche sur le site</span></a>
                        </div>
                        <div class="show-share-btn showshare htact"><i class="fa-solid fa-share-nodes"></i><span class="header-tooltip">Social</span></div>
                        <div class="nav-button-wrap">
                            <div class="nav-button">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <div class="share-wrapper isShare">
                            <div class="share-container fl-wrap"></div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="header-overlay close_cart-init"></div>
            <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
                <div class="bg par-elem " data-bg="<?= $config['background_link']; ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="container">
                    <div class="section-title">
                        <h4><?= $config['welcome']; ?></h4>
                        <h2><?= $config['name_wel'] ?></h2>
                        <div class="section-separator"><span></span></div>
                    </div>
                </div>
                <div class="hero-section-scroll">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                </div>
                <div class="dec-corner dc_lb"></div>
                <div class="dec-corner dc_rb"></div>
                <div class="dec-corner dc_rt"></div>
                <div class="dec-corner dc_lt"></div>
            </div>
            <div class="content">
                <div class="breadcrumbs-wrap">
                    <div class="container">
                        <a href="index.php">Home</a><i class="fa-solid fa-circle-arrow-right"></i><a href="#">Pages</a><i class="fa-solid fa-circle-arrow-right"></i><span><?= Common::VarSecure($this->link); ?></span> 
                    </div>
                </div>
                <div class="content-section">
                    <div class="section-dec"></div>
                    <div class="content-dec2 fs-wrapper"></div>
                    <div class="container">
                        <div class="row">
                            <?php if (strtolower($this->link) == 'news' and $this->fullwide == 0): ?>
                            <div class="col-lg-8">
                                <div class="post-container">
                                    <div class="dec-container">
                                        <div class="text-block">
                                            <?= $this->page; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-sidebar fixed-bar">
                                    <?php
                                    foreach ($this->widgets['right'] as $key => $value):
                                        echo $value['view'];
                                    endforeach;
                                    ?>
                                    <div class="main-sidebar-widget">
                                        <h3>Social Facebook</h3>
                                        <div class="social-widget">
                                            <div class="fb-page" data-href="https://www.facebook.com/<?= $config['facebook']; ?>" data-tabs="timeline" data-width="400" data-height="540" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                                <blockquote cite="https://www.facebook.com/<?= $config['facebook']; ?>" class="fb-xfbml-parse-ignore">
                                                    <a href="https://www.facebook.com/<?= $config['facebook']; ?>">Bel-CMS</a>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                                <div class="col-lg-12">
                                    <div class="text-block">
                                        <?= $this->page; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="limit-box"></div>
                </div>
                <div class="content-dec"><span></span></div>
            </div>
            <div class="height-emulator"></div>
            <footer class="main-footer">
                <div class="footer-inner">
                    <div class="container">
                        <div class="footer-widget-wrap">
                            <div class="footer-separator-wrap">
                                <div class="footer-separator"><span></span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">About us</div>
                                        <div class="footer-widget-content">
                                            <p style="text-align: justify;"><?= $config['about']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Informations de contact</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-contacts footer-box">
                                                <ul>
                                                    <li><span>Tel :</span><a href="#"><?= $config['tel']; ?></a></li>
                                                    <li><span>Mail  :</span><a href="#"><?= $config['mail']; ?></a></li>
                                                    <li><span>Pays : </span><a href="#"><?= $config['country']; ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Lien important</div>
                                        <div class="footer-widget-content">
                                            <div class="footer-list footer-box  ">
                                                <ul>
                                                    <li><a href="<?= $config['link_roi']; ?>">ROI</a></li>
                                                    <li><a href="<?= $config['rgpd']; ?>">RGPD</a></li>
                                                    <li><a href="<?= $config['policy']; ?>">Privacy Policy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="footer-widget">
                                        <div class="footer-widget-title">Newsletter</div>
                                        <div class="footer-widget-content">
                                            <div class="subcribe-form">
                                                <form id="subscribe">
                                                    <input class="enteremail" name="email" id="subscribe-email" placeholder="Email" spellcheck="false" type="email">
                                                    <button type="submit" id="subscribe-button" class="subscribe-button color-bg">Envoyer </button>
                                                    <label for="subscribe-email" class="subscribe-message"></label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-title-dec"><?= $config['footer_name']; ?></div>
                </div>
                <div class="footer-social">
                    <div class="container">
                        <ul>
                            <li><a href="<?= $config['social_facebook']; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="<?= $config['social_x']; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="<?= $config['social_web']; ?>" target="_blank"><i class="fa-brands fa-angellist"></i></a></li>
                            <li><a href="<?= $config['social_discord']; ?>" target="_blank"><i class="fa-brands fa-discord"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <a href="index.html" class="footer-logo"><img src="images/logo.png" alt=""></a>
                        <a href="https://www.bel-cms.dev" class="copyright">&#169; Bel-CMS <?= date('Y'); ?> . All rights reserved. </a>
                        <div class="to-top"><span>Top </span><i class="fal fa-angle-double-up"></i></div>
                    </div>
                </div>
            </footer>
        </div>
        <?php echo $this->js; ?>
        <script src="assets/templates/default/js/plugins.js"></script>
        <script src="assets/templates/default/js/scripts.js"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v25.0&appId=<?= $config['facebook_api']; ?>"></script>
    </body>
</html>