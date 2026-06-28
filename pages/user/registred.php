<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\GetHost;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Bel-CMS</title>
    <link rel="stylesheet" href="pages/user/css/login.css">
    <link rel="stylesheet" href="assets/css/belcms.global.css">
    <script src="/assets\/plugins/jQuery/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/belcms.core.js"></script>
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
    <div class="container">
        <div class="left-panel">
            <div class="login-box">
                <h2>Créer un compte</h2>
                <form action="User/createUser" method="post">
                    <input type="text" name="name" placeholder="Nom d'utilisateur" required>
                    <input type="email" name="mail" placeholder="Adresse email" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <div class="row" id="belcms_global_captcha">
                        <div id="belcms_global_captcha_style">
                            <span>Il faut passer par une vérification de sécurité.</span>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text">Résolvez le calcul : <?= $_SESSION['CAPTCHA']['question'] ?? 'Chargement...' ?></span>
                                <input type="number" name="captcha" class="form-control" placeholder="Votre réponse" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="belcms_captcha_container">
                                    <label><?= constant('CAPTCHA_MESSAGE_INDEX'); ?></label>
                                    <input type="range" id="belcms_captcha_slider" min="0" max="100" value="15">
                                    <div id="belcms_captcha_percent">0%</div>
                                    <input type="hidden" name="belcms_captcha_value" id="belcms_captcha_value">
                                    <input type="hidden" name="captcha_value" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit">S'inscrire</button>
                    
                </form>
                <div class="login-links">
                    <a href="User/login&echo">Se connecter</a>
                    <a href="User/passwordLost&echo">Mot de passe perdu ?</a>
                </div>
            </div>
        </div>
        <div class="right-panel">
            <div class="particles">
                <span style="left: 10%; animation-delay: 0s;"></span>
                <span style="left: 25%; animation-delay: 2s;"></span>
                <span style="left: 40%; animation-delay: 4s;"></span>
                <span style="left: 55%; animation-delay: 6s;"></span>
                <span style="left: 70%; animation-delay: 8s;"></span>
                <span style="left: 85%; animation-delay: 10s;"></span>
            </div>
            <div class="overlay">
                <h1>Bienvenue sur la création de compte</h1>
                <p>Créez votre compte</p>
            </div>
        </div>
    </div>
</body>

</html>