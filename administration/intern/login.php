<!DOCTYPE html>
<html lang="fr"
    dir="ltr"
    data-pattern-img="bgpattern14"
    data-nav-layout="horizontal"
    data-theme-mode="light"
    data-toggled="close"
    data-card-style="style15"
    data-card-background="background12"
    data-lt-installed="true">

<head>
    <meta charset=" UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $_SESSION['CONFIG']['CMS_NAME']; ?> - Administration Login</title>
    <meta name="Author" content="https://bel-cms.dev">
    <link id="style" href="/assets/plugins/bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/administration/intern/assets/css/styles.min.css" rel="stylesheet">
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
                            <form id="sendLogin" action="Login?management" method="post">
                                <label for="lockscreen" class="form-label text-default">E-mail privé</label>
                                <div class="position-relative">
                                    <input type="email" name="mail" required class="form-control" placeholder="E-mail">
                                </div>
                                <label for="lockscreen-password" class="form-label text-default">Mot de passe</label>
                                <div class="position-relative">
                                    <input type="password" required name="password" class="form-control create-password-input" id="-password" placeholder="password">
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <input type="submit" class="btn btn-primary" value="Déverrouiller">
                                </div>
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
    <script src="/assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
    <script src="/administration/intern/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/administration/intern/assets/js/show-password.js"></script>
    <script src="/administration/intern/login.js"></script>
</body>

</html>