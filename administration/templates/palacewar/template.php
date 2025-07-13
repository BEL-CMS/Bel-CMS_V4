<?php
$link = defined(strtoupper($this->link)) ? constant(strtoupper($this->link)) : $this->link;
?>
<!doctype html>
<html class="no-js" lang="fr">
<head>
<!--
  /*
  ###################################################################
  ###################################################################
  ##                                                               ##
  ##                           PalaceWaR - 2001                    ##
  ##                      Bel-CMS Version 4.0.0                    ##
  ##                  Systeme de gestion de contenue               ##
  ##                            PHP 8.4                            ##
  ##                  Copyright 2002-2025 by Bel-CMS               ##
  ##                 Développement par : Determe Stive             ##
  ##                                                               ##
  ###################################################################
  ###################################################################
  */
-->
    <base href="<?= $this->host; ?>">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PalaceWaR - <?= $link; ?></title>
    <meta name="author" content="Bel-CMS">
    <meta name="description" content="<?= $this->description; ?>">
    <meta name="keywords" content="<?= $this->keywords; ?>">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:site_name" content="PalaceWaR"/>
    <meta property="og:title" content="PalaceWaR"/>
    <meta property="og:url" content="https://palacewar.eu"/>
    <meta property="og:type" content="website"/>
    <meta property="og:PalaceWaR" content="PalaceWaR">
    <link rel="canonical" href="https://palacewar.eu"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Montserrat:wght@700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="templates/palacewar/assets/css/app.min.css">
    <link rel="stylesheet" href="templates/palacewar/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="templates/palacewar/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="templates/palacewar/assets/css/layerslider.min.css">
    <link rel="stylesheet" href="templates/palacewar/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="templates/palacewar/assets/css/slick.min.css">
    <link rel="stylesheet" href="templates/palacewar/assets/css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="templates/palacewar/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="templates/palacewar/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="templates/palacewar/favicon/favicon-16x16.png">
    <link rel="manifest" href="templates/palacewar/assets/favicon/site.webmanifest">
    <link type="text/plain" rel="author" href="templates/Bel-CMS_2025/humans.txt">
    <?= $this->css;?>
    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
</head>
<body>
    <div class="preloader">
        <button class="vs-btn preloaderCls">Annulé Preloader </button>
        <div class="preloader-inner">
            <div class="loader-logo">
                <img src="templates/palacewar/assets/img/logo.png" alt="Loader Image">
            </div>
            <div class="loader-wrap pt-4">
                <span class="loader"></span>
            </div>
        </div>
    </div>
    <div class="sticky-header-wrap sticky-header bg-black py-1 py-sm-2 py-lg-1">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-5 col-md-3">
                    <div class="logo">
                        <a href="index.php"><img src="templates/palacewar/assets/img/logo-2.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-7 col-md-9 text-end position-static">
                    <?php
                    include 'col1.php';
                    ?>
                    <button class="vs-menu-toggle text-theme border-theme d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area bg-dark">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.php"><img src="templates/palacewar/assets/img/logo.png" alt="palacewar logo"></a>
            </div>
            <div class="vs-mobile-menu link-inherit"></div>
        </div>
    </div>

    <header class="header-wrapper header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="top-innner">
                    <div class="row align-items-center">
                        <div class="col-sm-6 d-none d-md-block">
                            <div style="color:#FFF;" id="localtime"></div>
                        </div>
                        <div class="col-sm-6 text-end d-none d-md-block">
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="dropdown d-none d-lg-block">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-globe"></i>  French
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">French</a></li>
                                        <li><a class="dropdown-item" href="#">English</a></li>
                                    </ul>
                                </div>
                                <ul class="social-links fs-xs text-white">
                                    <li><a href="#" class="icon-btn6"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="icon-btn6"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="icon-btn6"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="icon-btn6"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container position-relative">
                <div class="menu-inner">
                    <div class="row align-items-center">
                        <div class="col-6 col-lg-4 d-block d-xl-none py-3 py-xl-0">
                            <div class="header-logo">
                                <a href="index.php"><img src="templates/palacewar/assets/img/logo-2.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-8 col-xl-5 text-end text-xl-start">
                        <?php
                        include 'col1.php';
                        ?>
                        <button type="button" class="vs-menu-toggle text-white d-inline-block d-lg-none"> <i class="far fa-bars"></i></button>
                        </div>
                        <div class="col-md-4 col-lg-2 text-center d-none d-xl-block">
                            <div class="header-logo1" style="margin-top: -53px;">
                                <a href="index.php"><img style="height: 106px;" src="templates/palacewar/assets/img/logo.png" alt="Logo PalaceWaR"></a>
                            </div>
                        </div>
                        <?php
                        include 'col2.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="breadcumb-wrapper breadcumb-layout1 pt-200 pb-50 mb-30" data-bg-src="templates/palacewar/assets/img/breadcumb/breadcumb-1.jpg" data-overlay>
        <div class="container z-index-common">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title h1 text-white my-0"><?= $link; ?></h1>
                <h2 class="breadcumb-bg-title"><?= $link; ?></h2>
                <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
                    <li><a href="index.php"><i class="fal fa-home"></i>Home</a></li>
                    <li class="active"><?=$this->link;?></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="vs-blog-wrapper blog-single-layout1">
        <div class="container">
            <div class="row">
                <?php
                if (strtolower($this->link) == 'news' and strtolower($this->view) != 'readmore'):
                ?>
                <div class="col-lg-8">
                    <?= $this->page; ?>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area sticky-top overflow-hidden">
                        <h3 class="sidebox-title-v2 h5">Facebook</h3>
                        <div class="vs-sidebox bg-smoke">
                            <div class="footer-item">
                            <div class="fb-page"
                                data-href="https://www.facebook.com/PalaceWaR"
                                data-width="340"
                                data-hide-cover="false"
                                data-tabs="events"
                                data-show-facepile="true"></div>
                            </div>
                        </div>
                        <iframe src="https://discord.com/widget?id=459367055762784266&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                    </aside>
                </div>
                <?php
                else:
                ?>
                <div class="col-lg-12">
                    <?= $this->page; ?>
                </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <section class="vs-team-wrapper newsletter-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area sticky-top overflow-hidden">
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (strtolower($this->link) == 'news' and strtolower($this->view) != 'readmore'):
    ?>
    <section class="vs-newsletter-wrapper bg-dark z-index-step1 ">
        <div class="container ">
            <div class="position-relative">
                <div class="inner-wrapper bg-black position-absolute top-50 start-50 translate-middle w-100 px-60 py-40">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-6 text-center text-xl-start mb-3 mb-xl-0">
                            <span class="sub-title2 mt-2">Newsletter</span>
                            <h2 class="mb-0 text-white">Avoir accès aux nouveautés.</h2>
                        </div>
                        <div class="col-md-10 col-lg-8 col-xl-6">
                            <form action="newsletter" class="newsletter-style1 d-md-flex">
                                <button class="vs-btn gradient-btn">Abonnez-vous maintenant</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    endif;
    ?>
    <footer class="footer-wrapper footer-layout1 bg-fluid bg-major-black position-relative">
        <div class="bg-fluid d-none d-none d-xl-block position-absolute start-0 top-0 w-100 h-100" data-bg-src="template/palacewar/assets/img/bg/footer-bg-1-1.jpg"></div>
        <div class="footer-widget-wrapper dark-style1 z-index-common" style='background-repeat:repeat;background-image:url("templates/palacewar/assets/img/footer/repeat.bg.png")'>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-lg-3 col-xl-4">
                        <div class="widget footer-widget pt-0">
                            <h3 class="widget_title">Qui sommes-nous</h3>
                            <div class="vs-widget-about">
                                <p class="about-text text-footer1 pe-xl-5" style="text-align:justify;">Nous formons un groupe francophone rassemblant des personnes de différent horizons.Axé principalement sur deux jeux, à savoir "Battlefield" et "Clash Royal"..</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2">
                        <div class="widget widget_categories footer-widget   ">
                            <h3 class="widget_title">Liens rapide</h3>
                            <ul>
                                <li><a href="downloads" title="telechargements">Téléchargements</a></li>
                                <li><a href="forum" title="forum">Forum</a></li>
                                <li><a href="Gallery" title="images">Galerie images</a></li>
                                <li><a href="#links" title="liste des liens">Liste des liens</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2">
                        <div class="widget widget_nav_menu footer-widget  ">
                            <h3 class="widget_title">Nos amis</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="https://bel-cms.be" title="Bel-CMS">Bel-CMS</a></li>
                                    <li><a href="https://www.aseh.be/" title="ASEH">ASEH</a></li>
                                    <li><a href="https://esport-cms.net/" title="Esport-CMS">Esport-CMS</a></li>
                                    <li><a href="https://determe.be" title="Determe">Portfolio</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="widget footer-widget  ">
                            <h3 class="widget_title">Contact</h3>
                            <div class="vs-widget-about">
                                <p class="contact-info"><i class="fal fa-map-marker-alt text-white"></i>France, Belgique, Canada, Suisse</p>
                                <p class="contact-info"><i class="fal fa-phone text-white"></i><a href="https://wa.me/0455143124">(+32) 14 31 24</a></p>
                                <p class="contact-info"><i class="fal fa-envelope text-white"></i><a id="email_a" href="">Contact@palacewar.eu</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright bg-black z-index-step1">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-auto align-self-center text-center py-3 py-xl-0 text-xl-start" style="overflow:hidden;">
                        <p class="copywrite-text" style="line-height:45px;display: inline-block;">Copyright © 2001 - <?= date("Y");?> <a href="index.php">PalaceWaR</a> All Rights Reserved By <a href="https//bel-cms.dev">Bel-CMS V4</a></p>
                    </div>
                    <div class="col-xl-auto d-none d-xl-block">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Temps de chargement :</a></li>
                                <li><span style="color: #8c48d7;" class="belcms_genered"></span></li>
                                <li> seconde.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    <a href="#" class="scrollToTop icon-btn3"><i class="far fa-angle-up"></i></a>
    <div class="vs-cursor"></div>
    <div class="vs-cursor2"></div>
    <?php echo $this->js; ?>
    <script type='text/javascript'>
        $( document ).ready(function() {
            Launch();
        });
    </script>
    <script src="templates/palacewar/assets/js/slick.min.js"></script>
    <script src="templates/palacewar/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="templates/palacewar/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="templates/palacewar/assets/js/isotope.pkgd.min.js"></script>
    <script src="templates/palacewar/assets/js/vs-cursor.min.js"></script>
    <script src="templates/palacewar/assets/js/vsmenu.min.js"></script>
    <script src="templates/palacewar/assets/js/map.js"></script>
    <script src="templates/palacewar/assets/js/ajax-mail.js"></script>
    <script src="templates/palacewar/assets/js/main.js"></script>
    <div id="fb-root"></div>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZTZHBN5Q4D"></script>
    <script type='text/javascript'>
    $(document).ready(function() {
        str1="mailto:";
        str2="contact";
        str3="@palacewar.eu";
        $("#email_a").attr("href", str1+str2+str3);

    });
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
        gtag('js', new Date());
        gtag('config', 'G-ZTZHBN5Q4D');
    </script>
    <script type='text/javascript'>
		var TabMois=new Array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre') 
		var ComputerDate;
		function perpetualDate() {
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v22.0&appId=775024024656688"></script>
		<div id="endloading" style="display:none;"><?php $time = (microtime(true) - $_SESSION['SESSION_START']); echo round($time, 3);?> </div>
        <script type='text/javascript'>
            window.onload = function() {
                var endloading = $('#endloading').text();
                $('.belcms_genered').append(endloading);
            };
        </script>
</body>

</html>