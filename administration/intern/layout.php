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
<!doctype html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-theme-mode="dark" data-card-style="style1" data-card-background="background2" loader="enable" style="--primary-rgb: 255, 255, 255; --theme-bg-gradient: #333333;" data-width="fullwidth" data-header-position="scrollable" data-menu-position="scrollable" data-bg-img="bgimg2" data-pattern-img="bgpattern5" data-nav-style="menu-hover">

<head>
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin panel, admin, admin template, dashboard template, dashboard template bootstrap, crm dashboard, stocks dashboard, projects dashboard, sales dashboard, html template, html css templates, html dashboard, dashboard, bootstrap dashboard, template dashboard">
    <script src="/administration/intern/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="/administration/intern/assets/js/main.js"></script>
    <link id="style" href="/administration/intern/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/administration/intern/assets/css/styles.css" rel="stylesheet">
    <link href="/administration/intern/assets/css/icons.css" rel="stylesheet">
    <link href="/administration/intern/assets/libs/node-waves/waves.min.css" rel="stylesheet">
    <link href="/administration/intern/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="/assets/plugins/DataTables-1.13.06/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/assets/plugins/glightbox/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/administration/intern/assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="/administration/intern/assets/libs/@simonwep/pickr/themes/nano.min.css">
    <link rel="stylesheet" href="/administration/intern/assets/libs/choices.js/public/assets/styles/choices.min.css">
</head>

<body>
    <div id="loader">
        <img src="/administration/intern/assets/images/media/loader.svg" alt="">
    </div>

    <header class="app-header sticky" style="display: none;">
        <div class="main-header-container container-fluid">
            <div class="header-content-left">
                <div class="header-element mx-lg-0 mx-2">
                    <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                </div>
            </div>
        </div>
    </header>

    <div class="page">

        <aside class="app-sidebar sticky" id="sidebar">

            <div class="top-left"></div>
            <div class="top-right"></div>
            <div class="bottom-left"></div>
            <div class="bottom-right"></div>
            <div class="main-sidebar-header">
                <a href="index.html" class="header-logo">
                    <img src="/administration/intern/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                    <img src="/administration/intern/assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                    <img src="/administration/intern/assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                    <img src="/administration/intern/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                </a>
            </div>
            <div class="main-sidebar" id="sidebar-scroll">
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg></div>
                    <ul class="main-menu">
                        <li class="slide has-sub"><a href="index.php?admin" class="side-menu__item"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54a8,8,0,0,1,2.62,5.92V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" opacity="0.2" />
                                    <path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54a8,8,0,0,1,2.62,5.92V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg><span class="side-menu__label">Accueil</span></a>
                            <ul class="slide-menu">
                                <li class="slide side-menu__label1"><a href="?admin">Accueil</a></li>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <polygon points="152 32 152 88 208 88 152 32" opacity="0.2" />
                                    <path d="M200,224H56a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h96l56,56V216A8,8,0,0,1,200,224Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polyline points="152 32 152 88 208 88" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg><span class="side-menu__label">Pages</span><i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1"><a href="javascript:void(0)">Pages</a></li>
                                <?php echo $menu->pages(); ?>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path d="M216,96v96a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V96Z" opacity="0.2" />
                                    <rect x="24" y="56" width="208" height="40" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <path d="M216,96v96a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <line x1="104" y1="136" x2="152" y2="136" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg><span class="side-menu__label">Paramètres</span><i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1"><a href="javascript:void(0)">Paramètres</a></li>
                                <?php echo $menu->settings(); ?>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path d="M128,32A96,96,0,0,0,63.8,199.38h0A72,72,0,0,1,128,160a40,40,0,1,1,40-40,40,40,0,0,1-40,40,72,72,0,0,1,64.2,39.37A96,96,0,0,0,128,32Z" opacity="0.2" />
                                    <circle cx="128" cy="120" r="40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <path d="M63.8,199.37a72,72,0,0,1,128.4,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polyline points="200 128 224 152 248 128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polyline points="8 128 32 104 56 128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <path d="M32,104v24a96,96,0,0,0,174,56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <path d="M224,152V128A96,96,0,0,0,50,72" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg><span class="side-menu__label">Utilisateurs</span><i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1"><a href="javascript:void(0)">Utilisateurs</a></li>
                                <?php echo $menu->user(); ?>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8" opacity="0.2" />
                                    <rect x="144" y="48" width="64" height="64" rx="8" opacity="0.2" />
                                    <rect x="48" y="144" width="64" height="64" rx="8" opacity="0.2" />
                                    <rect x="144" y="144" width="64" height="64" rx="8" opacity="0.2" />
                                    <rect x="144" y="144" width="64" height="64" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="48" width="64" height="64" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg><span class="side-menu__label">Widgtes</span><i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1"><a href="javascript:void(0)">Widgtes</a></li>
                                <?php echo $menu->Widgets(); ?>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <polygon points="32 80 128 136 224 80 128 24 32 80" opacity="0.2" />
                                    <polyline points="32 176 128 232 224 176" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polyline points="32 128 128 184 224 128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polygon points="32 80 128 136 224 80 128 24 32 80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg><span class="side-menu__label">Templates</span><i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1"><a href="javascript:void(0)">Templates</a></li>
                                <?php $menu->template(); ?>
                            </ul>
                        </li>
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <polygon points="152 32 152 88 208 88 152 32" opacity="0.2" />
                                    <path d="M200,224H56a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h96l56,56V216A8,8,0,0,1,200,224Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polyline points="152 32 152 88 208 88" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg><span class="side-menu__label">Liens rapide</span><i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1"><a href="javascript:void(0)">Liens rapide</a></li>
                                <?php $menu->fast(); ?>
                            </ul>
                        </li>
                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg></div>
                </nav>

            </div>
        </aside>
        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <?php echo $render; ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer mt-auto py-3 text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <?= date('Y'); ?>
                    <a href="https://bel-cms.dev" class="text-dark fw-medium">Bel-CMS</a></span> - All rights reserved
            </div>
            <p> Chargement de la page en <span style="margin: auto;margin-left: 10px;" id="belcms_genered"></span></p>
        </footer>

        <div class="scrollToTop">
            <span class="arrow"><i class="ti ti-arrow-narrow-up fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        <script src="/assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
        <script src="/assets/plugins/glightbox/glightbox.min.js"></script>
        <script src="/assets/plugins/DataTables-1.13.06/datatable.fr.js"></script>
        <script src="/assets/plugins/DataTables-1.13.06/datatables.min.js"></script>
        <script src="/administration/intern/assets/libs/@popperjs/core/umd/popper.min.js"></script>
        <script src="/administration/intern/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/administration/intern/assets/js/defaultmenu.min.js"></script>
        <script src="/administration/intern/assets/libs/node-waves/waves.min.js"></script>
        <script src="/administration/intern/assets/js/sticky.js"></script>
        <script src="/administration/intern/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/administration/intern/assets/js/simplebar.js"></script>
        <script src="/administration/intern/assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>
        <script src="/administration/intern/assets/js/custom-switcher.min.js"></script>
        <script src="/assets/plugins/tinymce/tinymce.min.js"></script>
        <script src="/assets/plugins/lightbox/lightbox.js"></script>
        <script src="/assets/belcms.core.js"></script>
        <script src="/administration/intern/assets/js/custom.js"></script>
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