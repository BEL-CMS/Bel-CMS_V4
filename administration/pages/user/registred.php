<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-toggled="close" data-vertical-style="default" data-card-style="style1" data-card-background="background1">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> SCIFI - Bootstrap 5 Premium Admin & Dashboard Template </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <script src="/administration/intern/assets/js/authentication-main.js"></script>
    <link id="style" href="/administration/intern/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/administration/intern/assets/css/styles.css" rel="stylesheet">
    <link href="/administration/intern/assets/css/icons.css" rel="stylesheet">
</head>

<body class="authentication-background">
    <div class="container-lg">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-5 col-xl-5 col-md-6 col-sm-8 col-12">
                <div class="card custom-card my-4">
                    <form action="/User/createUser" method="post">
                        <div class="top-left"></div>
                        <div class="top-right"></div>
                        <div class="bottom-left"></div>
                        <div class="bottom-right"></div>
                        <div class="card-body p-5">
                            <p class="h5 mb-2 text-center">S'enregistrer</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center fs-14">Bienvenue ! Commencez par créer votre compte.</p>
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signup-firstname" class="form-label text-default"><i style="color: red;">*</i> Nom d'utilisateur</label>
                                    <input name="name" type="text" class="form-control" id="signup-firstname" placeholder="Votre Nom d'utilisateur">
                                </div>
                                <div class="col-xl-12">
                                    <label for="signup-password" class="form-label text-default"><i style="color: red;">**</i>Mot de passe</label>
                                    <div class="position-relative">
                                        <input name="password" type="password" class="form-control create-password-input" id="signup-password" placeholder="Mot de passe">
                                        <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <label class="form-label text-default"><i style="color: red;">***</i> Votre e-mail</label>
                                    <input name="mail" type="email" class="form-control" id="signup-firstname" placeholder="Votre e-mail">
                                </div>
                                <div class="col-xl-12">
                                    <div class="position-relative">
                                        <i style="color: red;font-size:11px;display:block;">* Nom d'utilisateur</i>
                                        <i style="color: red;font-size:11px;display:block;">** Mot de passe de 6 caractères minimum</i>
                                        <i style="color: red;font-size:11px;display:block;">*** email ne sera jamais publié</i>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button class="btn btn-primary">Créer le compte</button>
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mt-3 mb-0">Vous avez déjà un compte ? <a href="/user/login&echo" class="text-primary">Se connecter</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="/administration/intern/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/administration/intern/assets/js/show-password.js"></script>

</body>

</html>