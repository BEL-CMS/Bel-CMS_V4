<?php
use BelCMS\Core\GetHost;
use BelCMS\Core\User;

$link = defined(strtoupper($this->link)) ? constant(strtoupper($this->link)) : $this->link;
$namePage = html_entity_decode($link, ENT_QUOTES | ENT_HTML5, 'UTF-8');
?>
<!DOCTYPE HTML>
<html lang="<?= $_SESSION['CONFIG']['CMS_WEBSITE_LANG']; ?>">
    <head>
        <!--=============== basic  ===============-->
        <base href="<?= GetHost::getBaseUrl(); ?>">
        <meta charset="UTF-8">
        <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - <?= $namePage; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content="<?= $this->keywords; ?>">
        <meta name="description" content="<?= $this->description; ?>">
        <meta name="author" content="Bel-CMS">
        <!--=============  style BelCMS ===============-->
        <?= $this->css; ?>
        <!--=============== css template  ===============-->	
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/reset.css">
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/style.css">
        <link type="text/css" rel="stylesheet" href="assets/templates/default/css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="assets/templates/default/images/favicon.ico">
    </head>
    <body>
        <!--================= loader start ================-->
        <div class="loader-holder">
            <div class="loader-inner loader-vis">
                <div class="loader"></div>
            </div>
        </div>
        <!-- loader end -->
        <!--================= main start ================-->
        <div id="main">
            <!--=============== wrapper inner ===============-->
            <div class="wrapper-inner">
                <!-- top bar -->
                <div class="top-bar">
                    <div class="top-bar-header">
                        <div class="dynamic-title">
                            <span>Page</span> 
                        </div>
                        <ul class="topbar-social">
                            <li><a href="#" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank" ><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" target="_blank" ><i class="fa fa-tumblr"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- top bar end -->
                <!-- header -->
                <header class="main-header">
                    <!-- logo holder  --> 
                    <div class="logo-holder">
                        <a href="index.html" class="ajax"><img src="assets/templates/default/images/folio/thumbs/1.jpg" alt=""></a>
                    </div>
                    <div class="nav-button"><span></span><span></span><span></span></div>
                    <div class="panel-button"><i class="fa fa-level-up"></i></div>
                    <?php include 'menu.php'; ?>
                    <div class="brochure-box">
                    <?php
                    if (User::isLogged() == true):
                        echo '<a href="user"><i class="fa-solid fa-user-check"></i><span>Centre utilisateur</span></a>';
                    else:
                        echo '<a href="user/login&echo"><i class="fa-solid fa-user-check"></i><span>Se connecter</span></a>';
                    endif;
                    ?>
                    </div>
                </header>
                <div class="wrap-bg">
                    <div id="wrapper">
                        <div class="content-holder scale-bg2 blg-content" data-bgs="assets/templates/default/images/bg/long/1.jpg" data-dyntitle="<?= $namePage; ?>">
                            <div class="content">
                                <section class="no-padding">
                                    <div class="parallax-inner">
                                        <div class="bg" data-bg="assets/templates/default/images/bg/1.jpg" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                                        <div class="overlay"></div>
                                        <div class="parallax-wrap">
                                            <div class="container">
                                                <div class="page-title">
                                                    <h3> <?= $namePage; ?></h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae libero.</p>
                                                    <span class="page-title-dec" data-top-bottom="transform: translateY(-50px);" data-bottom-top="transform: translateY(50px);"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <?php if (strtolower($this->link) == 'news' and $this->fullwide == 0): ?>
                                            <div class="col-md-8">
                                                <?php echo $this->page; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="widget-sidebar">
                                                    <h3>Banner</h3>
                                                    <div class="widget-inner">
                                                        <img src="assets/templates/default/images/folio/thumbs/1.jpg" class="respimg" alt="">
                                                    </div>
                                                    <?php
                                                    foreach ($this->widgets['right'] as $key => $value):
                                                        echo $value['view'];
                                                    endforeach;
                                                    ?>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="col-md-12">
                                                <?php echo $this->page; ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <footer>
                                <div class="footer-header">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- footer info -->
                                                <div class="footer-info">
                                                    <h4>About us</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus.</p>
                                                </div>
                                                <!-- footer info  end-->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- footer info   -->
                                                <div class="footer-info">
                                                    <h4>Contact info</h4>
                                                    <ul class="footer-contacts">
                                                        <li><a href="#"> <i class="fa fa-phone"></i> +7(111)123456789</a></li>
                                                        <li><a href="#"><i class="fa fa-motorcycle"></i> 27th Brooklyn New York, NY 10065</a></li>
                                                        <li><a href="#"><i class="fa fa-envelope-o"></i> yourmail@domain.com</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="footer-info">
                                                    <h4>Our Services</h4>
                                                    <div class="footer-serv-holder">
                                                        <ul>
                                                            <li><a href="serv-single.html" class="ajax">Design and Build</a></li>
                                                            <li><a href="serv-single.html" class="ajax">Household Repairs</a></li>
                                                            <li><a href="serv-single.html" class="ajax">Tiling and Painting</a></li>
                                                        </ul>
                                                        <ul>
                                                            <li><a href="serv-single.html" class="ajax">Design and Build</a></li>
                                                            <li><a href="serv-single.html" class="ajax">Household Repairs</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-footer">
                                    <div class="container">
                                        <div class="copy-right">Copyright © <?=date('Y'); ?> <a href="https://www.bel-cms.dev" class="">Bel-CMS</a>  All Rights Reserved</div>
                                        <div class="footer-social">
                                            <ul>
                                                <li><a href="#" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank" ><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#" target="_blank" ><i class="fa fa-tumblr"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-dec" data-top-bottom="transform: translateY(150px);" data-bottom-top="transform: translateY(-150px);"></div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            <div class="to-top">
                <i class="fa fa-long-arrow-up"></i>
            </div>
            <div class="body-bg">
                <div class="body-bg-wrap"></div>
            </div>
            <div class="fixed-column">
                <div class="fix-bg-wrap">
                    <div id="bgd"></div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
        <?= $this->js; ?>
        <script type="text/javascript" src="assets/templates/default/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/templates/default/js/plugins.js"></script>
        <script type="text/javascript" src="assets/templates/default/js/core.js"></script>
        <script type="text/javascript" src="assets/templates/default/js/scripts.js"></script>
    </body>
</html>