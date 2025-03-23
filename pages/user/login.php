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

if ($page == 'registred') {
    $name = 'S\'enregistrer';
} else if ($page == 'login') {
    $name = 'Bienvenue sur la page <b>login</b>';
} else {
    $name = 'Mot de passe perdu';
    $get  = empty($_GET['serial']) ? '' : $_GET['serial'];
}
?>
<!DOCTYPE html>
<html lang="fr"
    dir="ltr"
    data-pattern-img="bgpattern14"
    data-nav-layout="horizontal"
    data-theme-mode="dark"
    data-toggled="close"
    data-card-style="style15"
    data-card-background="background12"
    data-lt-installed="true">

<head>
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta charset=" UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Login</title>
    <meta name="Author" content="https://bel-cms.dev">
    <link id="style" href="/administration/intern/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/administration/intern/assets/css/styles.css" rel="stylesheet">
    <link href="/administration/intern/assets/css/icons.css" rel="stylesheet">
</head>

<body class="authentication-background">
    <div class="container-lg">
        <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="card custom-card">
                    <div class="top-left"></div>
                    <div class="top-right"></div>
                    <div class="bottom-left"></div>
                    <div class="bottom-right"></div>
                    <div class="card-body p-5">
                        <p class="h5 mb-3 text-center">Écran de verrouillage</p>
                        <div class="row gy-3">
                            <form action="User/sendLogin" method="post">
                                <label for="lockscreen" class="form-label text-default">E-mail / Pseudo</label>
                                <div class="position-relative">
                                    <input type="text" name="user" required class="form-control" placeholder="E-mail ou pseudo">
                                </div>
                                <label for="lockscreen-password" class="form-label text-default">Mot de passe</label>
                                <div class="position-relative">
                                    <input type="password" required name="password" class="form-control create-password-input" id="-password" placeholder="Mot de passe">
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <input type="submit" class="btn btn-primary" value="Déverrouiller">
                                </div>
                                <br><a href="User/require&echo">Mot de passe perdu ?</a><a style="float:right" href="User/registred&echo">Créer un compte</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="alert alert-primary" role="alert">
                        <div id="loading"><span>Veuillez patienter</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/jquery-3.7.1.min.js"></script>
    <script src="/administration/intern/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/administration/intern/assets/js/show-password.js"></script>
    <script src="/administration/intern/login.js"></script>
</body>

</html>