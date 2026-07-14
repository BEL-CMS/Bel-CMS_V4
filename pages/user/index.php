<?php

/**
 * Bel-CMS [Content management system]
*  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;

if (!empty($_SESSION['USER']->profils->gender)) {
    $_SESSION['USER']->profils->gender   = strtolower($_SESSION['USER']->profils->gender);
    $genderM        = $_SESSION['USER']->profils->gender == 'MALE' ? 'selected' : '';
    $genderF        = $_SESSION['USER']->profils->gender == 'FEMALE' ? 'selected' : '';
    $genderU        = $_SESSION['USER']->profils->gender == 'NOSPEC' ? 'selected' : '';
} else {
    $genderM        = '';
    $genderF        = '';
    $genderU        = 'selected';
}
if (!empty($_SESSION['USER']->profils->birthday)) {
    $birthday = Common::DatetimeReverse($_SESSION['USER']->profils->birthday);
} else {
 $birthday = date('Y-m-d');
}
if (empty($_SESSION['USER']->profils->avatar)) {
    $_SESSION['USER']->profils->avatar = constant('DEFAULT_AVATAR');
}
if (!empty($_SESSION['USER']->profils->hight_avatar) and !is_file($_SESSION['USER']->profils->hight_avatar)) {
    $_SESSION['USER']->profils->hight_avatar = 'assets/img/bg_default.png';
}
?>

<section id="belcms_pages_user">
    <nav id="belcms_pages_user_nav">
        <ul>
            <li class="active"><a href="user"><i class="fa-solid fa-user"></i> Mon profil</a></li>
            <li><a href="User/profils"><i class="fa-solid fa-user-pen"></i> Éditer mon profil</a></li>
            <li><a href="User/Social"><i class="fa-solid fa-share-nodes"></i> Éditer Social</a></li>
            <li><a href="User/avatar"><i class="fa-solid fa-image-portrait"></i> Éditer avatar</a></li>
            <li><a href="User/Material"><i class="fa-solid fa-computer"></i> Éditer matériels</a></li>
            <li><a href="user/logout"><i class="fa-solid fa-lock-open"></i> Déconnexion</a></li>
        </ul>
    </nav>
    <div class="row">
        <div class="col-12">
            <div id="belcms_user" class="card">
                <div class="card-header">
                    <?= $_SESSION['USER']->user->username; ?>
                </div>
                <div class="card-body">
                    <div id="belcms_user_img">
                        <img src="/uploads/users/bg-profile.png">
                        <img src="<?= $_SESSION['USER']->profils->avatar; ?>" class="rounded float-start" alt="Avatar User">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Informations personnelles</div>
                    <div class="card-body">
                        <form action="/user/sendGeneral" method="post">
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input type="text" value="<?= $_SESSION['USER']->user->username; ?>" name="username" required="required" class="form-control" id="input_user">
                                    <label for="input_user">Il s'agit de votre nom utilisateur</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input type="email" value="<?= $_SESSION['USER']->user->mail; ?>" name="mail" required="required" class="form-control" id="input_mail">
                                    <label for="input_mail">Votre e-mail privé <i style="color: red;">* jamais divulgué</i></label>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input type="date" value="<?= $birthday; ?>" min="1900-01-01" max="<?= date('Y-m-d'); ?>" name="birthday" class="form-control" id="input_birthday">
                                    <label for="input_birthday">La date à laquelle vous êtes né</label>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input type="url" value="<?= $_SESSION['USER']->profils->websites; ?>" name="websites" class="form-control" id="input_websites">
                                    <label for="input_websites">Lien vers votre site web</label>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <input type="text" id="demo-autocomplete" name="country" autocomplete="array:pays" class="form-control" value="<?= $_SESSION['USER']->profils->country; ?>">
                                    <label for="demo-autocomplete">Où est-ce que vous résidez? <i style="color: red;">Pays</i></label>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="form-floating">
                                    <select name="gender" class="form-select" id="input_inputgenre">
                                        <option <?= $genderM ?> value="male"><?= constant('MALE') ?></option>
                                        <option <?= $genderF ?> value="female"><?= constant('FEMALE') ?></option>
                                        <option <?= $genderU ?> value="nospec"><?= constant('NO_SPEC') ?></option>
                                    </select>
                                    <label for="input_inputgenre">Quel est votre genre masculin ou féminin?</label>
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-text">Signature</span>
                                <textarea class="form-control" name="info_text"><?= $_SESSION['USER']->profils->info_text; ?></textarea>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
