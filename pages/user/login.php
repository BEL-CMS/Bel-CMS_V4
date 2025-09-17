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
    <base href="<?= GetHost::getBaseUrl(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription Futuriste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/pages/user/css/login.css" rel="stylesheet">
</head>

<body>

    <div class="signup-box">
        <h2>Login</h2>
        <form action="User/sendLogin" method="post">
            <div class="mb-3">
                <input type="text" name="user" class="form-control" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn btn-neon">Déverrouiller</button>
            <div class="mt-3">
                <a href="User/passwordLost&echo">Mot de passe perdu ?</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>