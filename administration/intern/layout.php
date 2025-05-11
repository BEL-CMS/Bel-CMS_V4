<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\GetHost;

require 'administration/intern/menu.php';
$menu = new Menu();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="color" data-menu-styles="gradient" loader="enable" data-nav-style="menu-hover" data-page-style="classic" data-width="fullwidth" data-menu-position="fixed" data-header-position="scrollable" style="--primary-rgb: 58, 88, 146;">

<head>
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration</title>
    <meta name="Author" content="contact@bel-cms.dev">
    <script src="administration/intern/assets/js/main.js"></script>
    <link id="style" href="administration/intern/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="administration/intern/assets/css/styles.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome-6.5.1/css/all.min.css" rel="stylesheet">
    <link href="administration/intern/assets/icon-fonts/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="administration/intern/assets/icon-fonts/feather/feather.css" rel="stylesheet">
    <link href="administration/intern/assets/libs/node-waves/waves.min.css" rel="stylesheet">
    <link href="administration/intern/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="administration/intern/assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="administration/intern/assets/libs/@simonwep/pickr/themes/nano.min.css">
    <link rel="stylesheet" href="assets/plugins/lightbox/lightbox.css">
    <link rel="stylesheet" href="assets/plugins/DataTables-1.13.06/jquery.dataTables.min.css">
</head>

<body>
    <div id="loader">
        <img src="administration/intern/assets/images/media/loader.svg" alt="">
    </div>
    <div class="page">
        <header class="app-header">
            <div class="main-header-container container-fluid">
                <div class="header-content-left">
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="/?admin" class="header-logo">
                                <img src="administration/intern/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                                <img src="administration/intern/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                                <img src="administration/intern/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-dark">
                                <img src="administration/intern/assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                                <img src="administration/intern/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
                                <img src="administration/intern/assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
                            </a>
                        </div>
                    </div>
                    <div class="header-element">
                        <a aria-label="Hide Sidebar"
                            class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle mx-0"
                            data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                    </div>
                    <div class="header-element dropdown-element">
                        <div class="dropdown my-auto mx-2">
                            <button class="btn btn-outline-light dropdown-toggle fs-14" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fe fe-grid me-2 align-middle"></i>Accueil<i class="ri-arrow-down-s-line  align-bottom"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <aside class="app-sidebar sticky" id="sidebar">
            <div class="main-sidebar-header">
                <a href="/?admin" class="header-logo">
                    <img src="administration/intern/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                    <img src="administration/intern/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                    <img src="administration/intern/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-dark">
                    <img src="administration/intern/assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                    <img src="administration/intern/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
                    <img src="administration/intern/assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
                </a>
            </div>
            <div class="main-sidebar" id="sidebar-scroll">
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <ul class="main-menu">
                        <li class="slide__category"><span class="category-name">Menu</span></li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-doughnut-chart side-menu__icon"></i>
                                <span class="side-menu__label">Home</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Home</a>
                                </li>
                                <li class="slide">
                                    <a href="/?admin" class="side-menu__item">Retour à l'accueil</a>
                                </li>
                                <li class="slide">
                                    <a href="index.php" class="side-menu__item">Retour au site</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide__category"><span class="category-name">Pages</span></li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-hourglass side-menu__icon"></i>
                                <span class="side-menu__label">Paramètres</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Paramètres</a>
                                </li>
                                <?php echo $menu->settings(); ?>
                            </ul>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-server side-menu__icon"></i>
                                <span class="side-menu__label">Pages</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Pages</a>
                                </li>
                                <?php echo $menu->pages(); ?>
                            </ul>
                        </li>
                        <li class="slide__category"><span class="category-name">General</span></li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-file side-menu__icon"></i>
                                <span class="side-menu__label">Utilisateurs</span>
                                <i class="fe fe-chevron-down side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Utilisateurs</a>
                                </li>
                                <?php echo $menu->user(); ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="col-xl-9 mt-4" style="margin: auto;">
                            <?php echo $render; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a
                        href="https://bel-cms.dev" class="text-primary fw-semibold">Bel-CMS</a>.
                    All rights reserved<br> Chargement de la page en <span style="margin: auto;margin-left: 5px;" id="belcms_genered"></span>
                </span>
            </div>
        </footer>
    </div>

    <div class="scrollToTop" id="back-to-top">
        <i class="ri-arrow-up-s-fill fs-20"></i>
    </div>
    <div id="responsive-overlay"></div>
    <script src="/assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
    <script src="/assets/plugins/DataTables-1.13.06/datatable.fr.js"></script>
    <script src="/assets/plugins/DataTables-1.13.06/datatables.min.js"></script>
    <script src="administration/intern/assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="administration/intern/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="administration/intern/assets/js/defaultmenu.min.js"></script>
    <script src="administration/intern/assets/libs/node-waves/waves.min.js"></script>
    <script src="administration/intern/assets/js/sticky.js"></script>
    <script src="administration/intern/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="administration/intern/assets/js/simplebar.js"></script>
    <script src="administration/intern/assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>
    <script src="administration/intern/assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="administration/intern/assets/js/date-range.js"></script>
    <script src="administration/intern/assets/js/custom-switcher.min.js"></script>
    <script src="/assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="/assets/plugins/lightbox/lightbox.js"></script>
    <script src="/assets/belcms.core.js"></script>
    <script src="administration/intern/assets/js/custom.js"></script>
    <div id="endloading" style="display: none;">
        <?php usleep(500000); /* 1/2s permet de ne pas surcharger le serveur et lui laissez le temps d'une demi seconde */
        $time = (microtime(true) - $_SESSION['SESSION_START']);
        echo round($time, 3); ?> secondes </div>
    <script>
        $(window).on('load', function() {
            var endloading = $('#endloading').text();
            $('#belcms_genered').append(endloading);
        });
    </script>
</body>

</html>