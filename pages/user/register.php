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
        <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - Enregistrement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="/administration/assets/vendor/simplebar/simplebar.css">
        <link href="/assets/css/belcms.global.css" rel="stylesheet" type="text/css">
        <link href="/pages/user/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <link href="/pages/user/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <script src="/assets/plugins/jQuery/jquery-4.0.0.min.js"></script>
        <script type="text/javascript">
            $(document).on('input', '#belcms_captcha_slider', function () {
                let value = parseInt($(this).val());
                $('#belcms_captcha_percent').text(value + '%');
                $('#belcms_captcha_value').val(value);
                if (value < 25) {
                    $('#belcms_captcha_percent')
                        .css('color', '#00c853')
                        .html(value + '% ➜ Déplacez davantage le curseur');
                } else if (value >= 85) {
                    $('#belcms_captcha_percent')
                        .css('color', '#d50000')
                        .html(value + '% ❌ Zone rouge');
                } else {
                    $('#belcms_captcha_percent')
                        .css('color', '#00c853')
                        .html(value + '% ✓ Validation possible');
                }
            });
        </script>
    </head>
    <body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-10 px-5 auth-bg">
        <div class="main-wrapper border bg-white rounded-4 d-flex flex-column flex-lg-row gap-xl-5 position-relative overflow-hidden w-100 shadow">
            <div class="decoration-section m-5 bg-dark-subtle rounded-3 me-0 mb-0 mb-lg-5 mb-0 mb-lg-5" style="background: url('/pages/user/img/bg.png')"></div>
            <div class="login-section bg-white rounded-4 p-6 px-xl-12">
                <div class="mb-3">
                    <h5 class="mb-2">Inscription</h5>
                </div>
                <form id="signinForm" action="/user/createUser" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="" required name="name">
                        <label for="">Nom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="" required name="mail">
                        <label for="">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="" required name="password">
                        <label for="">Mot de passe</label>
                    </div>
                    <div class="input-group mb-2">
                        <div class="row" id="belcms_global_captcha">
                            <div id="belcms_global_captcha_style">
                                <span>Il faut passer par une vérification de sécurité.</span>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text">Résolvez le calcul : <?= $_SESSION['CAPTCHA']['question'] ?? 'Chargement...' ?></span>
                                    <input type="number" name="captcha" class="form-control" placeholder="Votre réponse" required>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="belcms_captcha_container">
                                        <label><?= constant('CAPTCHA_MESSAGE_INDEX'); ?></label>
                                        <input type="range" id="belcms_captcha_slider" min="0" max="100" value="15">
                                        <div id="belcms_captcha_percent">15%</div>
                                        <input type="hidden" name="belcms_captcha_value" id="belcms_captcha_value">
                                        <input type="hidden" name="captcha_value" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">S'enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/administration/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/administration/assets/vendor/simplebar/simplebar.js"></script>
    </body>
</html>