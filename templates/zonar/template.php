<?php
$link = (defined(strtoupper($this->link))) ? constant(strtoupper($this->link)) : $this->link;
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <base href="<?=$this->host;?>">
        <title>Bel-CMS - <?=$link;?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="robots" content="index, follow">
		<meta name="keywords" content="cms, fr, bel-cms, systeme, demo, github">
		<meta name="description" content="Content Management System, systeme de gestion de contenue">
		<link type="text/plain" rel="author" href="templates/zonar/humans.txt">
        <?=$this->css;?>
        <link type="text/css" rel="stylesheet" href="templates/zonar/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="templates/zonar/css/style.css">
        <link type="text/css" rel="stylesheet" href="templates/zonar/css/color.css">
		<link rel="apple-touch-icon" sizes="76x76" href="templates/zonar/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="templates/zonar/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="templates/zonar/favicon/favicon-16x16.png">
		<link rel="manifest" href="templates/zonar/favicon/site.webmanifest">
		<link rel="mask-icon" href="templates/zonar/favicon/safari-pinned-tab.svg" color="#5bbad5">
    </head>
    <body>
        <div id="main">
            <header class="main-header">
                <a href="index.php" class="logo-holder"><img src="templates/zonar/video/Bel.gif" alt=""></a>
                <div class="nav-button but-hol">
                    <span  class="ncs"></span>
                    <span class="nos"></span>
                    <span class="nbs"></span>
                    <div class="menu-button-text">Menu</div>
                </div>
                <div class="header-contacts">
                    <ul>
                        <li><span>01. E-Mail </span> <a href="Contact">Conact e-mail</a></li>
                        <li><span>02. Meta </span> <a href="https://www.facebook.com/Bel.CMS">Meta (FB)</a></li>
                    </ul>
                    <a href="Contact" class="contacts-btn">Contact</a>
                </div>
            </header>
            <aside class="left-header">
                <span class="lh_dec color-bg"></span>
                <div class="left-header_social">
                    <ul >
                        <li><a href="https://www.facebook.com/Bel.CMS" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/BelCMS_V3" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://discord.gg/PwpwSaBKu7" target="_blank"><i class="fab fa-discord"></i></a></li>
                        <li><a href="https://github.com/BEL-CMS/BEL-CMS-V3" target="_blank"><i class="fab fa-github"></i></a></li>
                    </ul>
                </div>
            </aside>
            <div class="share-btn showshare color-bg"><span>Share <i class="fal fa-plus"></i></span></div>
            <div class="hc_dec_color">
                <div class="page-subtitle"><span></span></div>
            </div>
            <?php
			if (strtolower($this->link) == 'news' AND $this->fullwide !== true AND empty($_GET)):
                require 'home.php';
            elseif (strtolower($this->link) == 'news' AND $this->fullwide == null):
                require 'news.php';
            else:
                require 'pages.php';
            endif;
            ?>
            <div class="element">
                <div class="element-item"></div>
            </div>
        </div>
        <?=$this->js;?>
        <script  src="templates/zonar/js/plugins.js"></script>
        <script  src="templates/zonar/js/scripts.js"></script>
		<div id="endloading">
		<?php
    		$temps = microtime();
    		$temps = explode(' ', $temps);
    		$fin = $temps[1] + $temps[0];
    		echo round(($fin - $_SESSION['SESSION_START']),3);
		?>	
		</div>
		<script>
			$(window).on('load', function() {
				var endloading = $('#endloading').text();
				$('.belcms_genered').append(endloading);
			});
		</script>
    </body>
</html>