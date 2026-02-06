<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Administration</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Bel-CMS" name="author" />
    <script type="module" src="administration/assets/js/layout-setup.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="administration/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="administration/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="administration/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="administration/assets/images/favicon/site.webmanifest">
    <link rel="shortcut icon" href="administration/assets/images/favicon/favicon.png">
    <link href="administration/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="administration/assets/libs/nouislider/nouislider.min.css" rel="stylesheet">
    <link href="administration/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="administration/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="administration/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-10 px-5 auth-bg">
        <div class="main-wrapper border bg-white rounded-4 d-flex flex-column flex-lg-row gap-xl-5 position-relative overflow-hidden w-100 shadow">
            <div class="decoration-section m-5 bg-dark-subtle rounded-3 me-0 mb-0 mb-lg-5 mb-0 mb-lg-5"></div>
            <div class="login-section bg-white rounded-4 p-6 px-xl-12">
            <a href="https://bel-cms.dev" class="d-flex justify-content-end align-items-center gap-2 logo-main mt-lg-2 mb-10">
                <img height="33" width="33" class="logo-dark" alt="Dark Logo" src="administration/assets/images/logo-md.png">
                <h3 class="mb-0 lh-base fw-semibold">Bel-CMS</h3>
            </a>
            <div class="mb-12">
                <h5 class="mb-2">Bienvenue <?= $_SESSION['USER']->user->username; ?></h5>
                <p class="text-muted mb-0">Connectez-vous pour accéder à l'administration</p>
            </div>
            <form id="sendLogin" action="Login?management" method="post">
                <div class="mb-4">
                <input type="text" class="form-control" id="name" readonly value="<?= $_SESSION['USER']->user->username; ?>">
                </div>
                <div class="mb-4">
                <input type="email" class="form-control" name="mail" id="email" placeholder="e-mail priver" required>
                </div>
                <div class="mb-4">
                <div class="position-relative">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <button type="button" class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted toggle-password" id="toggle-password" data-target="password"> <i class="ri-eye-off-line align-middle"></i> </button>
                </div>
                </div>
                <div class="mb-10">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="form-text ms-auto">
                    <a href="auth-forgot-password.html" class="link link-primary">Mot de passe perdu ?</a>
                    </div>
                </div>
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary w-100" id=""><span>Login</span></button>
                </div>
                <div>
                    <div class="btn btn-warning w-100" id="loading"><span>Identification en attente</span></div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
    <script src="administration/intern/login.js"></script>
    <script src="administration/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="administration/assets/libs/gsap/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/robin-dela/hover-effect@latest/dist/hover-effect.umd.js"></script>
    <script src="administration/assets/js/pages/common.init.js"></script>
    <script src="administration/assets/js/auth/auth.init.js"></script>
</body>
</html>