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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Bel-CMS</title>
    <link rel="stylesheet" href="pages/user/css/login.css">
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
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
                        <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
                    </div>
                    <input type="hidden" name="captcha_value" value="">
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