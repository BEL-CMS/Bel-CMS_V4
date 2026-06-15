<!DOCTYPE html>
<html lang="fr">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bel-CMS" name="author">
    <meta content="admin template, alina admin template, dashboard template, flat admin template, responsive admin template, web app" name="keywords">
    <link href="administration/assets/images/logo/favicon.png" rel="icon" type="image/x-icon">
    <link href="administration/assets/images/logo/favicon.png" rel="shortcut icon" type="image/x-icon">
    <title>Login Administration</title>
    <link href="administration/assets/vendor/fontawesome/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link href="administration/assets/vendor/tabler-icons/tabler-icons.css" rel="stylesheet" type="text/css">
    <link href="administration/assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="administration/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="administration/assets/css/responsive.css" rel="stylesheet" type="text/css">
    <script src="administration/assets/js/jquery-3.6.3.min.js"></script>
    <script src="administration/intern/login.js"></script>
</head>
<body>
<div class="auth-container">
    <div class="card form-container">
        <div class="card-body">
            <div class="text-center pt-3">
                <span class="bg-gradient-primary h-75 w-80 overflow-hidden d-flex-center b-r-10 mx-auto p-2 auth-logo">
                    <img src="administration/assets/images/apple-touch-icon.png" alt="User" class="img-fluid">
                </span>
                <h3 class="mb-0 pt-3">Se loguer</h3>
            </div>
            <form id="sendLogin" action="Login?management" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="fullName">Nom</label>
                            <input class="form-control" type="text" id="fullName" readonly placeholder="" value="<?= $_SESSION['USER']->user->username; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="emailId">Email</label>
                            <input class="form-control" name="mail" type="email" id="emailId" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="password">Mot de passe</label>
                            <input class="form-control" name="password" type="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input id="submitText" type="submit" value="Entrer" class="btn bg-gradient-primary w-100 btn-lg b-r-20">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>