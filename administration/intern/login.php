<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Administration</title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="assets/plugins/bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="administration/intern/auth-cover.css" rel="stylesheet" type="text/css" />
</head>
<body class="form">
    <div class="auth-container d-flex">
        <div class="container mx-auto align-self-center">
            <div class="row">
                <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>
                    <div class="auth-cover">
                        <div class="position-relative">
                            <img src="administration/intern/auth.webp" alt="auth-img">
                        </div>
                    </div>
                </div>
                <form id="sendLogin" action="Login?management" method="post" class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h2>Login</h2>
                                    <p>Saisissez votre adresse e-mail et votre mot de passe pour vous connecter.</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="mail" type="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-secondary w-100">Se connecter</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span><div class="btn btn-warning w-100" id="loading"><span>Identification en attente</span></div></span>
                                </div>
                                <div class="col-12">
                                    <div class="text-center">
                                        <p class="mb-0">Un probleme avec vous connecté ? <a href="/forum" class="text-warning">Forum</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
    <script src="/administration/intern/login.js"></script>
    <script src="assets/plugins/bootstrap-5.3.3/js/bootstrap.min.js"></script>
</body>
</html>