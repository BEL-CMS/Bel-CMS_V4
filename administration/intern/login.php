<!DOCTYPE html>
<html lang="fr">
    <!--
    /*
    ###################################################################
    ###################################################################
    ##                                                               ##
    ##                           Bel-CMS                             ##
    ##                      Bel-CMS Version 4.1.1                    ##
    ##                  Systeme de gestion de contenue               ##
    ##                            PHP 8.5                            ##
    ##                  Copyright 2014-2026 by Bel-CMS               ##
    ##                 Développement par : Determe Stive             ##
    ##                                                               ##
    ###################################################################
    ###################################################################
    */
    -->
    <head>
        <meta charset="utf-8">
        <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="/administration/assets/vendor/simplebar/simplebar.css">
        <link href="/pages/user/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <link href="/pages/user/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <script src="/assets/plugins/jQuery/jquery-4.0.0.min.js"></script>
        <script src="/administration/intern/login.js"></script>
    </head>
    <body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-10 px-5 auth-bg">
        <div class="main-wrapper border bg-white rounded-4 d-flex flex-column flex-lg-row gap-xl-5 position-relative overflow-hidden w-100 shadow">
            <div class="decoration-section m-5 bg-dark-subtle rounded-3 me-0 mb-0 mb-lg-5 mb-0 mb-lg-5" style="background: url('/pages/user/img/bg.png')"></div>
            <div class="login-section bg-white rounded-4 p-6 px-xl-12">
                <a href="index.html" class="d-flex justify-content-end align-items-center gap-2 logo-main mt-lg-2 mb-10">
                    <img height="100" width="100" class="logo-dark" alt="Dark Logo" src="/assets/img/logo.png">
                </a>
                <form id="signinForm" action="Login?management&echo" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="" name="user" readonly value="<?= $_SESSION['USER']->user->username; ?>">
                        <label for="">Nom :</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="" required name="mail" type="email">
                        <label for="">E-mail :</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="password" type="password" id="password" placeholder="Password" required>
                        <label for="">Mot de passe :</label>
                    </div>
                    <div id="submitTextAlert" class="alert alert-warning d-flex align-items-center" role="alert">
                        <div id="submitText">En attente... </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/administration/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/administration/assets/vendor/simplebar/simplebar.js"></script>
    </body>
</html>