<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - Administration Login</title>
    <meta name="Author" content="https://bel-cms.dev">
    <link href="administration/intern/assets/login.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="left-panel">
            <div class="login-box">
                <h2>Connexion</h2>
                <form id="sendLogin" action="Login?management" method="post">
                    <input name="mail" type="text" placeholder="@bel-cms.dev" required>
                    <input name="password" type="password" placeholder="Mot de passe" required>
                    <button type="submit">Se connecter</button>
                </form>
                <div class="login-links">
                    <a href="#">Mot de passe perdu ?</a>
                    <a href="#">S'enregistrer</a>
                </div>
                <div class="alert alert-primary" role="alert">
                    <div id="loading"><span>Veuillez entrer vos identifiants</span></div>
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
                <h1>Bienvenue sur <?= $_SESSION['CONFIG']['CMS_NAME']; ?></h1>
            </div>
        </div>
    </div>
    <script src="/assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
    <script src="/administration/intern/login.js"></script>
</body>

</html>