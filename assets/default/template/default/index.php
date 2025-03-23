<?php

use BelCMS\Core\GetHost;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $var->description; ?>">
    <meta name="author" content="stive at determe.be">
    <title><?= $var->title; ?></title>
    <?= $var->css; ?>
    <link href="/assets/default/template/default/css/styles.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="https://bel-cms.dev">Bel-CMS Démo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" active href="news">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="Members">Membres</a></li>
                    <li class="nav-item"><a class="nav-link" href="Contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="User">Utilisateur</a></li>
                    <li class="nav-item"><a class="nav-link" href="?admin">Administration</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Bienvenue sur le thème par défaut de Bel-CMS !</h1>
                <p class="lead mb-0">Le C.M.S utilise Boostrap 5.x</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-8">
                <?= $var->page; ?>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Bel-CMS 2025</p>
        </div>
    </footer>
    <?= $var->js; ?>
</body>

</html>