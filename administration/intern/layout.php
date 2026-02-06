<?php
use BelCMS\Core\GetHost;
use BelCMS\Core\groups;
require 'administration/intern/menu.php';
$menu = new Menu();
$nameG = groups::getName($_SESSION['USER']->groups->user_group);
$nameG = isset($nameG->name) ? constant($nameG->name) : $nameG->name;
?>
<!DOCTYPE html>
<html lang="fr" data-layout="horizontal" data-bs-theme="light" data-sidebar-color="light" data-content-width="box" dir="ltr" data-theme-colors="dark" data-topbar-theme="dark" suppresshydrationwarning="true" data-lt-installed="true">
<head>
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta charset="utf-8">
    <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Admin" name="description">
    <meta content="Bel-CMS" name="Bel-CMS">
    <script src="assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
    <script type="module" src="administration/assets/js/layout-setup.js"></script>
    <link rel="apple-touch-icon" sizes="180x180"    href="administration/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="administration/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="administration/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="administration/assets/images/favicon/site.webmanifest">
    <link rel="stylesheet" href="administration/assets/libs/simplebar/simplebar.min.css">
    <link rel="stylesheet" href="administration/assets/libs/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="administration/assets/css/bootstrap.min.css" id="bootstrap-style" type="text/css">
    <link rel="stylesheet" href="administration/assets/css/icons.min.css" type="text/css">
    <link rel="stylesheet" href="administration/assets/css/app.min.css" id="app-style" type="text/css">
    <link rel="stylesheet" href="assets/plugins/lightbox/lightbox.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/glightbox/glightbox.min.css" type="text/css">
</head>

<body>
    <div id="loader">
        <div class="flex-column justify-content-center align-items-center vh-100" id="loader" style="margin-top: 10%;">
        <div class="position-relative d-flex justify-content-center align-items-center">
            <div class="spinner-border text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
            <span class="position-absolute fw-bold text-primary"><?= constant('COPYRIGHT'); ?></span>
        </div>
        <p class="mt-3 text-muted"><?= constant('INITIALIZATION_ADMIN'); ?></p>
        </div>
    </div>
    <div id="layout-wrapper">
        <header class="app-header" id="appHeader">
            <div class="container-fluid w-100 px-0 px-md-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-flex align-items-center gap-2">
                        <a href="index.php?admin" class="align-items-center logo-main d-none me-5 gap-2">
                            <img height="33" width="33" class="logo-dark" alt="Dark Logo" src="administration/assets/images/logo-md.png">
                            <h3 class="text-white text-opacity-80 mb-0 lh-base fw-semibold"><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - Administration</h3>
                        </a>
                        <button type="button" class="vertical-toggle btn text-muted rounded-circle icon-btn" id="toggleSidebar" aria-label="Toggle Sidebar">
                            <i class="ri-menu-2-line fs-4 toggle-left-arrow"></i>
                            <i class="ri-close-line fs-4 toggle-right-arrow d-none"></i>
                        </button>
                        <button type="button" class="horizontal-toggle btn text-muted rounded-circle icon-btn header-btn d-none header-menu-btn" id="toggleHorizontal" aria-label="Toggle Menu">
                            <i class="ri-menu-2-line fs-5 lh-sm"></i>
                        </button>
                    </div>
                    <div class="flex-shrink-0 d-flex align-items-center gap-1 gap-md-3">
                        <div class="dropdown pe-dropdown-mega d-none d-md-block">
                            <button class="btn rounded-circle text-muted icon-btn fs-5 header-menu-btn position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Messages">
                                <i class="ri-translate"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-clickable dropdown-menu-end dropdown-mega-xs header-dropdown-menu pe-noti-dropdown-menu shadow-none border p-0">
                                <div class="card mb-0 border-0">
                                    <div class="card-header p-4">
                                        <h5 class="card-title">Langues</h5>
                                    </div>
                                    <div class="noti-item d-flex align-items-center gap-2 py-2">
                                        <img src="administration/assets/images/circle-flag/fr.svg" alt="French" width="26" height="26" class="rounded-circle"> French
                                    </div>
                                    <div class="noti-item d-flex align-items-center gap-2 py-2">
                                        <img src="administration/assets/images/circle-flag/gb.svg" alt="English" width="26" height="26" class="rounded-circle"> English
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <button class="btn text-muted rounded-circle icon-btn fs-5 header-menu-btn d-none d-md-inline-flex" type="button" id="toggleFullscreen" aria-label="Toggle fullscreen">
                            <i class="ri-fullscreen-line"></i>
                        </button>
                        <div id="toggleMode">
                            <button id="theme-toggle" class="btn icon-btn theme-toggle" title="Toggles light & dark theme" aria-label="Switch to dark theme" aria-live="polite" type="button">
                                <svg class="sun-and-moon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24">
                                    <mask class="moon" id="moon-mask">
                                        <rect x="0" y="0" width="100%" height="100%" fill="white" />
                                        <circle cx="24" cy="10" r="6" fill="black" />
                                    </mask>
                                    <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask)" fill="currentColor" />
                                    <g class="sun-beams" stroke="currentColor">
                                        <line x1="12" y1="1" x2="12" y2="3" />
                                        <line x1="12" y1="21" x2="12" y2="23" />
                                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                                        <line x1="1" y1="12" x2="3" y2="12" />
                                        <line x1="21" y1="12" x2="23" y2="12" />
                                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
                                    </g>
                                </svg>
                            </button>
                        </div>
                        <div class="dropdown pe-dropdown-mega">
                            <button class="btn p-0 gap-2 text-start d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-end mt-2 d-none d-md-block">
                                    <span class="user-name d-block lh-1 fs-14"><?= $_SESSION['USER']->user->username; ?></span>
                                    <span class="text-muted fw-normal fs-13"><?= $nameG; ?></span>
                                </span>
                                <span class="story-ring h-40px w-40px rounded-circle d-flex justify-content-center align-items-center">
                                    <img src="<?= $_SESSION['USER']->profils->avatar; ?>" alt="Avatar" class="h-36px w-36px rounded-circle user-img">
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-mega-xs dropdown-menu-end header-dropdown-menu shadow-sm border">
                                <div class="d-flex gap-4 align-items-center justify-content-between mb-2 py-2 px-4 border rounded-2">
                                    <div>
                                        <h6 class="mb-1 fs-14"><?= $_SESSION['USER']->user->username; ?></h6>
                                        <small class="text-muted mb-0"><?= $_SESSION['USER']->user->mail; ?></small>
                                    </div>
                                    <div class="story-ring h-44px w-44px rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="<?= $_SESSION['USER']->profils->avatar; ?>" alt="Avatar" class="h-40px w-40px rounded-circle">
                                    </div>
                                </div>
                                <div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="profile-item">
                                            <a href="pages-profile.html" class="text-body">
                                                <i class="ri-user-line me-3"></i>Profile
                                            </a>
                                        </li>
                                        <li class="profile-item">
                                            <a href="auth-signout.html" class="text-danger">
                                                <i class="ri-logout-box-r-line me-3"></i>Sign out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header-wrapper"></div>
        <aside class="pe-app-sidebar horizontal-sidebar" id="horizontal-aside">
            <nav class="pe-app-sidebar-menu nav nav-pills">
                <ul class="pe-horizontal-menu mb-0 list-unstyled" id="horizontal-menu">
                    <li class="pe-slide pe-has-sub">
                        <a onclick="location.href='index.php?admin'" class="pe-nav-link">
                            <i class="uil uil-tachometer-fast-alt pe-nav-icon"></i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li class="pe-slide pe-has-sub">
                        <a class="pe-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseApplications">
                            <i class="uil uil-apps pe-nav-icon"></i>
                            <span class="pe-nav-content">Widgets</span>
                            <i class="ri-arrow-right-s-line pe-nav-arrow arrow-right"></i>
                            <i class="ri-arrow-left-s-line pe-nav-arrow arrow-left"></i>
                        </a>
                        <ul class="pe-slide-menu collapse" id="collapseApplications">
                            <?php echo $menu->Widgets(); ?>
                        </ul>
                    </li>
                    <!-- Pages -->
                    <li class="pe-menu-title">Pages</li>
                    <li class="pe-slide pe-has-sub">
                        <a class="pe-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseAuth">
                            <i class="ri-user-line pe-nav-icon"></i>
                            <span class="pe-nav-content">Utilisateurs</span>
                            <i class="ri-arrow-right-s-line pe-nav-arrow arrow-right"></i>
                            <i class="ri-arrow-left-s-line pe-nav-arrow arrow-left"></i>
                        </a>
                        <ul class="pe-slide-menu collapse" id="collapseUsers">
                            <?php echo $menu->user(); ?>
                        </ul>
                    </li>
                    <li class="pe-slide pe-has-sub">
                        <a class="pe-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapsePages">
                            <i class="ri-pages-line pe-nav-icon"></i>
                            <span class="pe-nav-content">Pages</span>
                            <i class="ri-arrow-right-s-line pe-nav-arrow arrow-right"></i>
                            <i class="ri-arrow-left-s-line pe-nav-arrow arrow-left"></i>
                        </a>
                        <ul class="pe-slide-menu collapse" id="collapsePages">
                            <li class="slide pe-nav-content1">
                                <a href="javascript:void(0)">Pages</a>
                            </li>
                            <?php echo $menu->pages(); ?>
                        </ul>
                    </li>
                    <li class="pe-menu-title">Components</li>
                    <li class="pe-slide pe-has-sub">
                        <a class="pe-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseBaseUI">
                            <i class="ri-pencil-ruler-2-line pe-nav-icon"></i>
                            <span class="pe-nav-content">Template</span>
                            <i class="ri-arrow-right-s-line pe-nav-arrow arrow-right"></i>
                            <i class="ri-arrow-left-s-line pe-nav-arrow arrow-left"></i>
                        </a>
                        <ul class="pe-slide-menu collapse" id="collapseBaseUI" data-simplebar style="max-height: 550px;">
                            <li class="slide pe-nav-content1">
                                <a href="javascript:void(0)">Template</a>
                            </li>
                            <?php echo $menu->template(); ?>
                        </ul>
                    </li>
                    <li class="pe-slide pe-has-sub">
                        <a class="pe-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseMore">
                            <i class="ri-color-filter-ai-line pe-nav-icon"></i>
                            <span class="pe-nav-content">Extra</span>
                            <i class="ri-arrow-right-s-line pe-nav-arrow arrow-right"></i>
                            <i class="ri-arrow-left-s-line pe-nav-arrow arrow-left"></i>
                        </a>
                        <ul class="pe-slide-menu collapse" id="collapseExtra" data-simplebar style="max-height: 550px;">
                            <li class="slide pe-nav-content1">
                                <a href="javascript:void(0)">Extra</a>
                            </li>
                            <?php echo $menu->extras(); ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="sidebar-backdrop" id="sidebar-backdrop"></div>
        <main class="app-wrapper">
            <div class="container-fluid">
                <div class="main-breadcrumb d-flex flex-wrap align-items-center my-4 position-relative gap-3">
                    <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-16">Profile</h2>
                    <div class="flex-shrink-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-end mb-0">
                                <li><i class="ri-home-4-line fs-16 me-2 lh-sm text-primary"></i></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="gap-4 content-title d-none">
                        <div class="text-end">
                            <h5 class="mb-2 text-white fs-16">Profile</h5>
                            <h6 class="text-opacity-50 text-white fs-14 fw-medium mb-0">Page Overview</h6>
                        </div>
                        <div class="avatar-item avatar-lg rounded avatar-title text-white bg-white bg-opacity-10 border-0">
                            <i class="uil uil-layers fs-4"></i>
                        </div>
                    </div>
                </div>
                <?php echo $render; ?>
            </div>
        </main>

        <div class="progress-wrap d-flex align-items-center justify-content-center cursor-pointer h-40px w-40px position-fixed" id="progress-scroll">
        <svg class="progress-circle w-100 h-100 position-absolute" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="45" class="progress">
        </svg>
        <i class="ri-arrow-up-line fs-16 z-1 position-relative text-primary"></i>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center gap-2">
                    <script>document.write(new Date().getFullYear());</script> All rights reserved <a href="https://bel-cms.dev" target="_blank">Bel-CMS V4.0.1</a>
                    <div class="text-sm-end d-none d-sm-block">
                        Chargement de la page en <span id="belcms_genered"></span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="/assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="administration/assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="administration/assets/libs/bb/js/bootstrap.bundle.min.js"></script>
    <script src="administration/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="administration/assets/js/scroll-top.init.js"></script>
    <script src="administration/assets/js/app.js"></script>
    <script src="assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="assets/plugins/lightbox/lightbox.js"></script>
    <script src="assets/plugins/glightbox/glightbox.min.js/plugins/glightbox/glightbox.min.js"></script>
    <script src="assets/js/belcms.core.js"></script>
    <div id="endloading" style="display: none;">
    <?php usleep(microseconds: 500000); /* 1/2s permet de ne pas surcharger le serveur et lui laissez le temps d'une demi seconde */
    $time = (microtime(true) - $_SESSION['SESSION_START']);
    echo round($time, 3); ?> secondes </div>
    <script>
        $(window).on(' load', function() {
        var endloading = $('#endloading').text();
        $('#belcms_genered').append(endloading);
        });
        $(window).on("load", function () {
            $("#loader").fadeOut(300, function () {
                $("#content").removeClass("d-none").css("opacity", "1");
            });
        });
    </script>
</body>
</html>