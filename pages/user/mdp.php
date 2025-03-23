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
$social = $_SESSION['USER']->social;
?>
<div class="row">
    <div class="col-sm-4">
        <div id="belcms_user" class="card">
            <div class="card-header">
                <img style="max-width: 100%;" src="<?=$_SESSION['USER']->profils->avatar;?>" class="rounded float-start" alt="Avatar User">
            </div>
            <ul id="belcms_user_ul" class="list-group list-group-flush">
                <li class="list-group-item"><a href="/User">Accueil</a></li>
                <li class="list-group-item"><a href="/User/profils">Profils</a></li>
                <li class="list-group-item active"><a href="/User/mdp">Mot de passe</a></li>
                <li class="list-group-item"><a href="/User/Social">Social</a></li>
                <li class="list-group-item"><a href="/User/Material">Matériels</a></li>
                <li class="list-group-item"><a href="/User/Grp">Groupe(s)</a></li>
                <li class="list-group-item"><a href="/User/Logout">Se déconnecter</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">Révision du mot de passe</div>
            <form action="/user/submitPassword" method="post">
                <div class="card-body">
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input type="password" name="old_password" required="required" class="form-control" id="input_pass">
                            <label for="input_pass">Il s'agit de votre ancien mot de passe</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Utilisation des jeux de caractères a-z et A-Z et @#*/ <i style="color: red;">* 6 caractères min</i></label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="password_new" id="password_new" minlength="6" data-size="32" data-character-set="data-character-set="a-z,A-Z,0-9,#" required="required">
                            <span class="input-group-btn">
                                <button onclick="javascript:generer_password('password_new');" type="button" class="btn btn-default getNewPass">
                                    <span class="fa fa-refresh"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="submit" class="btn btn-success" value="Enregister">
                                </div>
                                <div class="col-sm-6">
                                    <input onclick="location.href='/User/deleteAccount';" type="button" class="btn btn-danger" value="* Supprimer mon compte">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <p><i style="color:red">*</i> La suppression est irréversible, toutes les données seront effacées, sauf les message ou news ou là, ça sera marqué "utilisateur effacé".</p>
                </div>
            </div>
        </div>
    </div>
</div>