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

use BelCMS\Core\groups;
use BelCMS\Core\GetHost;
require 'administration/intern/menu.php';
$menu = new Menu();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr" data-nav-layout="horizontal" data-theme-mode="light" data-header-styles="dark" data-width="fullwidth" data-menu-styles="dark" data-page-style="modern" data-toggled="double-menu-close" loader="enable" suppresshydrationwarning="true" data-lt-installed="true" data-nav-style="menu-hover" data-bg-img="bgimg5">
    
    <head>
        <meta charset="UTF-8">
    	<title><?= $_SESSION['CONFIG']['CMS_NAME'] ?> - Administration</title>
    	<base href="<?= GetHost::getBaseUrl(); ?>">
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Administration">
        <meta name="Author" content="https://www.bel-cms.dev">
        <meta name="keywords" content="admin, panel, admin panel">
        <link rel="icon" href="administration/intern/assets/images/brand-logos/favicon.ico" type="image/x-icon">
        <script src="administration/intern/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="administration/intern/assets/js/main.js"></script>
        <link id="style" href="administration/intern/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
        <link href="administration/intern/assets/css/styles.css" rel="stylesheet" >
        <link href="administration/intern/assets/css/icons.css" rel="stylesheet" >
        <link href="administration/intern/assets/libs/node-waves/waves.min.css" rel="stylesheet" > 
        <link href="administration/intern/assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="administration/intern/assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="administration/intern/assets/libs/@simonwep/pickr/themes/nano.min.css">
        <link rel="stylesheet" href="administration/intern/assets/libs/choices.js/public/assets/styles/choices.min.css">
        <link rel="stylesheet" href="administration/intern/assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="administration/intern/assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css">
    	<link rel="stylesheet" href="assets/plugins/DataTables-2.3.6/buttons.bootstrap5.css">
    	<link rel="stylesheet" href="assets/plugins/DataTables-2.3.6/dataTables.bootstrap5.css">
    	<link rel="stylesheet" href="assets/plugins/DataTables-2.3.6/dataTables.jqueryui.css">
    	<link rel="stylesheet" href="assets/plugins/glightbox/glightbox.min.css">
    	<script type="text/javascript" src="assets/plugins/tinymce/tinymce.min.js"></script>
    	<script src="assets/plugins/DataTables-2.3.6/datatables.min.js"></script>
    	<script type="text/javascript" src="assets/plugins/tinymce/tinymce.min.js"></script>
    	<script src="assets/plugins/glightbox/glightbox.min.js"></script>
        <link rel="stylesheet" href="assets/plugins/fontawesome-6.5.1/css/all.min.css">

    </head>
    <body class="">
        <div class="progress-top-bar"></div>
        <div id="loader" >
            <img src="administration/intern/assets/images/media/loader.svg" alt="">
        </div>
        <div class="page">
			<header class="app-header sticky" id="header">
				<div class="main-header-container container-fluid">
					<div class="header-content-left">
						<div class="header-element">
							<div class="horizontal-logo">
								<a href="index.php" class="header-logo">
									<img src="administration/intern/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
									<img src="administration/intern/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
									<img src="administration/intern/assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
									<img src="administration/intern/assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
								</a>
							</div>
						</div>
						<div class="header-element mx-lg-0 mx-2">
							<a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
						</div>
						<div class="header-element header-search d-md-block d-none">
							<input type="text" class="header-search-bar form-control bg-white" id="header-search" placeholder="Search" spellcheck=false autocomplete="off" autocapitalize="off">
							<a href="javascript:void(0);" class="header-search-icon border-0">
								<i class="bi bi-search fs-12"></i>
							</a>
						</div>
					</div>
					<ul class="header-content-right">
						<li class="header-element d-md-none d-block">
							<a href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#header-responsive-search">
								<svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><circle cx="112" cy="112" r="80" opacity="0.2"/><circle cx="112" cy="112" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="168.57" y1="168.57" x2="224" y2="224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
							</a>  
						</li>
						<li class="header-element header-theme-mode">
							<a href="javascript:void(0);" class="header-link layout-setting">
								<span class="light-layout">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M108.11,28.11A96.09,96.09,0,0,0,227.89,147.89,96,96,0,1,1,108.11,28.11Z" opacity="0.2"/><path d="M108.11,28.11A96.09,96.09,0,0,0,227.89,147.89,96,96,0,1,1,108.11,28.11Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
								</span>
								<span class="dark-layout">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><circle cx="128" cy="128" r="56" opacity="0.2"/><line x1="128" y1="40" x2="128" y2="32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><circle cx="128" cy="128" r="56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="64" y1="64" x2="56" y2="56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="64" y1="192" x2="56" y2="200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="192" y1="64" x2="200" y2="56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="192" y1="192" x2="200" y2="200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="40" y1="128" x2="32" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="128" y1="216" x2="128" y2="224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="216" y1="128" x2="224" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
								</span>
							</a>
						</li>
						<li class="header-element header-fullscreen">
							<a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
								<svg xmlns="http://www.w3.org/2000/svg" class="full-screen-open header-link-icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><rect x="48" y="48" width="160" height="160" opacity="0.2"/><polyline points="168 48 208 48 208 88" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="88 208 48 208 48 168" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="208 168 208 208 168 208" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="48 88 48 48 88 48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
								<svg xmlns="http://www.w3.org/2000/svg" class="full-screen-close header-link-icon d-none" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><rect x="32" y="32" width="192" height="192" rx="16" opacity="0.2"/><polyline points="160 48 208 48 208 96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="144" y1="112" x2="208" y2="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><polyline points="96 208 48 208 48 160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line x1="112" y1="144" x2="48" y2="208" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
							</a>
						</li>
						<li class="header-element dropdown">
							<a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
								<div>
									<img src="administration/intern/assets/images/faces/12.jpg" alt="img" class="header-link-icon">
								</div>
							</a>
							<div class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
								<div class="p-3 bg-primary text-fixed-white">
									<div class="d-flex align-items-center justify-content-between">
										<p class="mb-0 fs-16">Profile</p>
										<a href="javascript:void(0);" class="text-fixed-white"><i class="ti ti-settings-cog"></i></a>
									</div>
								</div>
								<div class="dropdown-divider"></div>
								<div class="p-3">
									<div class="d-flex align-items-start gap-2">
										<div class="lh-1">
											<span class="avatar avatar-sm bg-primary-transparent avatar-rounded">
												<img src="administration/intern/assets/images/faces/12.jpg" alt="">
											</span>
										</div>
										<div>
											<span class="d-block fw-semibold lh-1">Tom Phillip</span>
											<span class="text-muted fs-12">tomphillip32@gmail.com</span>
										</div>
									</div>
								</div>
								<div class="dropdown-divider"></div>
								<ul class="list-unstyled mb-0">
									<li>
										<ul class="list-unstyled mb-0 sub-list">
											<li>
												<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i class="ti ti-user-circle me-2 fs-18"></i>View Profile</a>
											</li>
											<li>
												<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i class="ti ti-settings-cog me-2 fs-18"></i>Account Settings</a>
											</li>
										</ul>        
									</li>
									<li>
										<ul class="list-unstyled mb-0 sub-list">
											<li>
												<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i class="ti ti-lifebuoy me-2 fs-18"></i>Support</a>
											</li>
											<li>
												<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i class="ti ti-bolt me-2 fs-18"></i>Activity Log</a>
											</li>
											<li>
												<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i class="ti ti-calendar me-2 fs-18"></i>Events</a>
											</li>
										</ul>        
									</li>
									<li><a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i class="ti ti-logout me-2 fs-18"></i>Log Out</a></li>
								</ul>
							</div>
						</li>  
						<li class="header-element">
							<a href="javascript:void(0);" class="header-link switcher-icon" data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
								<svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><path d="M207.86,123.18l16.78-21a99.14,99.14,0,0,0-10.07-24.29l-26.7-3a81,81,0,0,0-6.81-6.81l-3-26.71a99.43,99.43,0,0,0-24.3-10l-21,16.77a81.59,81.59,0,0,0-9.64,0l-21-16.78A99.14,99.14,0,0,0,77.91,41.43l-3,26.7a81,81,0,0,0-6.81,6.81l-26.71,3a99.43,99.43,0,0,0-10,24.3l16.77,21a81.59,81.59,0,0,0,0,9.64l-16.78,21a99.14,99.14,0,0,0,10.07,24.29l26.7,3a81,81,0,0,0,6.81,6.81l3,26.71a99.43,99.43,0,0,0,24.3,10l21-16.77a81.59,81.59,0,0,0,9.64,0l21,16.78a99.14,99.14,0,0,0,24.29-10.07l3-26.7a81,81,0,0,0,6.81-6.81l26.71-3a99.43,99.43,0,0,0,10-24.3l-16.77-21A81.59,81.59,0,0,0,207.86,123.18ZM128,168a40,40,0,1,1,40-40A40,40,0,0,1,128,168Z" opacity="0.2"/><circle cx="128" cy="128" r="40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><path d="M41.43,178.09A99.14,99.14,0,0,1,31.36,153.8l16.78-21a81.59,81.59,0,0,1,0-9.64l-16.77-21a99.43,99.43,0,0,1,10.05-24.3l26.71-3a81,81,0,0,1,6.81-6.81l3-26.7A99.14,99.14,0,0,1,102.2,31.36l21,16.78a81.59,81.59,0,0,1,9.64,0l21-16.77a99.43,99.43,0,0,1,24.3,10.05l3,26.71a81,81,0,0,1,6.81,6.81l26.7,3a99.14,99.14,0,0,1,10.07,24.29l-16.78,21a81.59,81.59,0,0,1,0,9.64l16.77,21a99.43,99.43,0,0,1-10,24.3l-26.71,3a81,81,0,0,1-6.81,6.81l-3,26.7a99.14,99.14,0,0,1-24.29,10.07l-21-16.78a81.59,81.59,0,0,1-9.64,0l-21,16.77a99.43,99.43,0,0,1-24.3-10l-3-26.71a81,81,0,0,1-6.81-6.81Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
							</a>
						</li>
					</ul>
				</div>
			</header>
			<aside class="app-sidebar sticky" id="sidebar">

				<div class="main-sidebar-header">
					<a href="index.php" class="header-logo">
						<img src="administration/intern/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
						<img src="administration/intern/assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
						<img src="administration/intern/assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
						<img src="administration/intern/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
					</a>
				</div>

				<div class="main-sidebar" id="sidebar-scroll">
					<nav class="main-menu-container nav nav-pills flex-column sub-open">
						<div class="slide-left" id="slide-left">
							<svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
						</div>
						<ul class="main-menu">
							<li class="slide has-sub">
								<a href="?admin" class="side-menu__item">
									<i class="fa-solid fa-house side-menu__icon"></i>
									<span class="side-menu__label">Accueil</span>
								</a>
								<ul class="slide-menu">
									<li>
                                        <i class="fa-solid fa-house"></i>
										<a href="?admin">Accueil</a>
									</li>
								</ul>
							</li>
                            <li class="slide has-sub">
                                <a class="side-menu__item" href="#!">
                                    <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                    <i class="fa-solid fa-file-lines side-menu__icon"></i>
                                    <span class="side-menu__label">Pages </span>
                                </a>
                                <ul class="slide-menu child1" style="display: none">
                                    <li class="slide side-menu__label1"><a href="#!"><i class="fa-solid fa-file-lines"></i>Pages</a></li>
                                    <?= $menu->pages(); ?>
                                </ul>
                            </li>
                            <li class="slide has-sub">
                                <a class="side-menu__item" href="#!">
                                    <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                    <i class="fa-solid fa-users side-menu__icon"></i>
                                    <span class="side-menu__label">Utilisateurs </span>
                                </a>
                                <ul class="slide-menu child1" style="display: none">
                                    <li class="slide side-menu__label1"><a href="#!"><i class="fa-solid fa-file-lines"></i>Utilisateurs</a></li>
                                    <?= $menu->user(); ?>
                                </ul>
                            </li>
                            <li class="slide has-sub">
                                <a class="side-menu__item" href="#!">
                                    <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                    <i class="fa-solid fa-gear side-menu__icon"></i>
                                    <span class="side-menu__label">Configuration</span>
                                </a>
                                <ul class="slide-menu child1" style="display: none">
                                    <li class="slide side-menu__label1"><a href="#!">
                                    <i class="fa-solid fa-file-lines"></i>Configuration</a></li>
                                    <?= $menu->settings(); ?>
                                </ul>
                            </li>
                            <li class="slide has-sub">
                                <a class="side-menu__item" href="#!">
                                    <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                    <i class="fa-solid fa-users side-menu__icon"></i>
                                    <span class="side-menu__label">Extra</span>
                                </a>
                                <ul class="slide-menu child1" style="display: none">
                                    <li class="slide side-menu__label1"><a href="#!"><i class="fa-solid fa-file-lines"></i>Extra</a></li>
                                    <?= $menu->extras(); ?>
                                </ul>
                            </li>
                        </ul>
						<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
					</nav>
				</div>
			</aside>

            <div class="main-content app-content">
                <div class="container-fluid page-container main-body-container">
                    <?php echo $render; ?>
                </div>
            </div>
			<footer class="footer mt-auto py-3 text-center">
				<div class="container">
					<span class="text-muted"> Copyright © <span id="year"></span> All rights reserved
						<a href="https://www.bel-cms.dev" class="text-dark fw-medium">Bel-CMS</a>.
						<a href="javascript:void(0);" target="_blank"> <span class="fw-medium text-primary"><div id="belcms_genered"></div></span></a> 
					</span>
				</div>
			</footer>
        </div>
        <div class="scrollToTop">
        	<span class="arrow lh-1"><i class="ti ti-arrow-big-up fs-18"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        <script src="administration/intern/assets/libs/@popperjs/core/umd/popper.min.js"></script>
        <script src="administration/intern/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="administration/intern/assets/libs/node-waves/waves.min.js"></script>
        <script src="administration/intern/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="administration/intern/assets/js/simplebar.js"></script>
        <script src="administration/intern/assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js"></script>
        <script src="administration/intern/assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>
        <script src="administration/intern/assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="administration/intern/assets/js/sticky.js"></script>
        <script src="administration/intern/assets/js/defaultmenu.min.js"></script>
        <script src="administration/intern/assets/js/custom.js"></script>
        <script src="administration/intern/assets/js/custom-switcher.min.js"></script>
		<script type="text/javascript" src="assets/js/belcms.core.js"></script>
		<div id="endloading" style="display: none;">
			<?php usleep(500000); /* 1/2s permet de ne pas surcharger le serveur et lui laissez le temps d'une demi seconde */
			$time = (microtime(true) - $_SESSION['SESSION_START']);
			echo round($time, 3); ?> secondes 
		</div>
		<script>
			$(window).on(' load', function() {
			var endloading = $('#endloading').text();
			$('#belcms_genered').append(endloading);
			});
		</script>
    </body> 

</html>
