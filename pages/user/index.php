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
$birthday = Common::DatetimeReverse($_SESSION['USER']->profils->birthday);
if (empty($_SESSION['USER']->profils->avatar)) {
    $_SESSION['USER']->profils->avatar = constant('DEFAULT_AVATAR');
}
if (!empty($_SESSION['USER']->profils->hight_avatar) and !is_file($_SESSION['USER']->profils->hight_avatar)) {
    $_SESSION['USER']->profils->hight_avatar = 'assets/img/bg_default.png';
}
?>
<div class="row">
    <div class="col-sm-4">
        <div id="belcms_user" class="card">
            <div class="card-header">
                <img style="max-width: 100%;" src="<?=$_SESSION['USER']->profils->avatar;?>" class="rounded float-start" alt="Avatar User">
            </div>
            <ul id="belcms_user_ul" class="list-group list-group-flush">
                <li class="list-group-item active"><a href="/User">Accueil</a></li>
                <li class="list-group-item"><a href="/User/profils">Profils</a></li>
                <li class="list-group-item"><a href="/User/mdp">Mot de passe</a></li>
                <li class="list-group-item"><a href="/User/Social">Social</a></li>
                <li class="list-group-item"><a href="/User/Material">Matériels</a></li>
                <li class="list-group-item"><a href="/User/Grp">Groupe(s)</a></li>
                <li class="list-group-item"><a href="/User/Logout">Se déconnecter</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Informations personnelles</div>
            <div class="card-body">
                <form action="/user/sendGeneral" method="post">
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input type="text" value="<?=$_SESSION['USER']->user->username;?>" name="username" required="required" class="form-control" id="input_user">
                            <label for="input_user">Il s'agit de votre nom utilisateur</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input type="email" value="<?=$_SESSION['USER']->user->mail;?>" name="mail" required="required" class="form-control" id="input_mail">
                            <label for="input_mail">Votre e-mail privé <i style="color: red;">* jamais divulgué</i></label>
                        </div>
                    </div>

                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input type="date" value="<?=$birthday;?>" min="1900-01-01" max="<?=date('Y-m-d');?>" name="birthday" class="form-control" id="input_birthday">
                            <label for="input_birthday">La date à laquelle vous êtes né</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input type="url" value="<?=$_SESSION['USER']->profils->websites;?>" name="websites" class="form-control" id="input_websites">
                            <label for="input_websites">Lien vers votre site web</label>
                        </div>
                    </div>

                    <div class="input-group mb-2">
                        <div class="form-floating">
                        <input type="text" id="demo-autocomplete" name="country" autocomplete="array:pays" class="form-control" value="<?=$_SESSION['USER']->profils->country;?>">
                            <label for="demo-autocomplete">Où est-ce que vous résidez? <i style="color: red;">Pays</i></label>
                        </div>
                    </div>

                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <select name="gender" class="form-select" id="input_inputgenre">
                                <option <?=$genderM?> value="male"><?=constant('MALE')?></option>
                                <option <?=$genderF?> value="female"><?=constant('FEMALE')?></option>
                                <option <?=$genderU?> value="nospec"><?=constant('NO_SPEC')?></option>
                            </select>
                            <label for="input_inputgenre">Quel est votre genre masculin ou féminin?</label>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-text">Signature</span>
                        <textarea class="form-control" name="info_text"><?=$_SESSION['USER']->profils->info_text;?></textarea>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>