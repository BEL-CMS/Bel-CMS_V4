<?php
use BelCMS\Core\GetHost;
use BelCMS\Core\groups;
require 'administration/intern/menu.php';
$menu = new Menu();
$nameG = groups::getName($_SESSION['USER']->groups->user_group);
$nameG = isset($nameG->name) ? constant($nameG->name) : $nameG->name;
?>
<!DOCTYPE html>
<html lang="fr" data-lt-installed="true">

<head>
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="la-themes" name="author">
    <link href="administration/assets/images/logo/favicon.png" rel="icon" type="image/x-icon">
    <link href="administration/assets/images/logo/favicon.png" rel="shortcut icon" type="image/x-icon">
    <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - Administration</title>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link href="administration/assets/vendor/tabler-icons/tabler-icons.css" rel="stylesheet" type="text/css">
    <link href="administration/assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="administration/assets/vendor/simplebar/simplebar.css" rel="stylesheet" type="text/css">
    <link href="administration/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="administration/assets/css/responsive.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/plugins/lightbox/lightbox.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/glightbox/glightbox.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-6.5.1/css/all.min.css" type="text/css">
</head>

<body class="dark layout-ltr theme-gradient-4" text="large-text">
    <div class="app-wrapper sidebar-vertical">
        <div class="loader-wrapper">
            <div class="loader-box">
                <div class="loader-6">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <nav class="app-navbar">
            <div class="semi-side-nav">
                <div class="py-4">
                    <span class="bg-white h-40 w-40 d-flex-center b-r-12 mx-auto">
                        <img style="width: 32px;height:32px;" src="administration/assets/images/logo.png">
                    </span>
                </div>
                <ul class="navbar-menu-list" role="tablist">
                    <li class="nav-item">
                        <a href="index.php?admin" class="nav-link" data-target="homePage">
                            <i class="ti ti-brand-stackshare"></i>
                        </a>
                    </li>
                </ul>
                <span class="bg-primary-800 h-45 w-45 d-flex-center b-r-30 position-relative mx-auto ">
                <img alt="avatar" class="img-fluid b-r-30" src="administration/assets/images/avatar/01.png">
                <span class="position-absolute top-0 end-0 p-1 bg-gradient-success border border-light rounded-circle"></span>
            </span>
            </div>
            <div class="main-side-nav">
                <div>
                    <a class="logo d-inline-block" href="index.php?admin">
                        <img style="margin: auto;display:block;text-align:center;" src="administration/assets/images/apple-touch-icon.png">
                    </a>
                    <span class="w-30 h-30 d-none bg-gradient-danger b-r-8 cursor-pointer side-toggle">
                        <i class="ti ti-x f-s-18"></i>
                    </span>
                </div>
                <div class="nav-wrapper app-scroll app-simple-bar">
                    <div class="main-side-menu">
                        <ul class="main-menu" id="homePage">
                            <li>
                                <a aria-expanded="true" data-bs-toggle="collapse" href="#dashboard">Accueil</a>
                                <ul class="collapse" id="dashboard">
                                    <li><a href="index.php?admin">Administration</a></li>
                                    <li><a href="index.php">Site-web</a></li>
                                </ul>
                                <ul class="collapse" id="PageLink">
                                    <?php echo $menu->pages(); ?>
                                </ul>
                            </li>
                            <li>
                                <a aria-expanded="false" data-bs-toggle="collapse" href="#settings">Parametres</a>
                                <ul class="collapse" id="settings">
                                    <?php echo $menu->settings(); ?>
                                </ul>
                            </li>
                            <li>
                                <a aria-expanded="false" data-bs-toggle="collapse" href="#Pages">Pages</a>
                                <ul class="collapse" id="Pages">
                                    <?php echo $menu->pages(); ?>
                                </ul>
                            </li>
                            <li>
                                <a aria-expanded="false" data-bs-toggle="collapse" href="#user">Utilisateus</a>
                                <ul class="collapse" id="user">
                                    <?php echo $menu->user(); ?>
                                </ul>
                            </li>
                            <li>
                                <a aria-expanded="false" data-bs-toggle="collapse" href="#widgets">Widgets</a>
                                <ul class="collapse" id="widgets">
                                    <?php echo $menu->Widgets(); ?>
                                </ul>
                            </li>
                            <li>
                                <a aria-expanded="false" data-bs-toggle="collapse" href="#extras">Extras</a>
                                <ul class="collapse" id="extras">
                                    <?php echo $menu->extras(); ?>
                                </ul>
                            </li>
                            <li>
                                <a aria-expanded="false" data-bs-toggle="collapse" href="#games">Teams</a>
                                <ul class="collapse" id="games">
                                    <?php echo $menu->games(); ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="px-3">
                    <div>
                        <a href="index.php" class="sidebar-folder-box">
                            <div class="empty-icon">
                                <i class="ti ti-folder-filled f-s-35 text-warning"></i>
                            </div>
                            <h6 class="text-dark mb-0">Accueil</h6>
                            <span class="btn btn-dark btn-sm mt-3">Retourné sur le site</span>
                        </a>
                    </div>
                </div>

            </div>
        </nav>

        <div class="app-content">
            <header class="header-main">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-6 head-left">
                            <div class="d-flex align-items-center gap-3">
                                <span class="cursor-pointer main-side-toggle">
                                <i class="ti ti-align-justified f-s-22 text-secondary"></i>
                                </span>
                                <h4 class="txt-ellipsis-2">Bienvenue ! sur <span>l'administration</span></h4>
                            </div>
                        </div>
                        <div class="col-6 head-right">
                            <ul class="d-flex gap-2 align-items-center justify-content-end">
                                <li class="head-maximize-screen">
                                    <span class="h-40 w-40 d-flex-center b-r-50 head-icon">
                                        <i class="ti ti-arrows-maximize"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <div>
                <ul class="app-breadcrumbs">
                    <li class="">
                        <a class="f-s-14 f-w-500" href="index.php?admin">
                        <span>
                            Accueil
                        </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500" href="#"></a>
                    </li>
                </ul>
            </div>

            <main>
                <div class="container-fluid">
                    <div class="row">
                        <?php echo $render; ?>
                    </div>
                </div>
            </main>
        </div>

        <div class="go-top">
        <span class="progress-value">
            <i class="ti ti-chevron-up"></i>
        </span>
        </div>

        <footer class="footer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 col-12">
                        <p class="footer-text f-w-600 mb-0">Copyright © 2015-<?= date('Y'); ?> Bel-CMS. All rights reserved 💖 V4.0.1</p>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-text text-end">
                            <a class="f-w-500 text-primary" href="mailto:conact@bel-cms.dev"> Demande de l'aide
                                <i class="ti ti-help"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div id="theme-customizer-box"></div>
    </div>

<script src="administration/assets/js/jquery-3.6.3.min.js"></script>
<script src="assets/plugins/tinymce/tinymce.min.js"></script>
<script src="assets/plugins/lightbox/lightbox.js"></script>
<script src="assets/plugins/glightbox/glightbox.min.js/plugins/glightbox/glightbox.min.js"></script>
<script src="administration/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="administration/assets/vendor/simplebar/simplebar.js"></script>
<script src="administration/assets/js/script.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/belcms.core.js"></script>
</body>
</html>