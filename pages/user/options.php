<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Notification;

?>
<section id="belcms_pages_user">
    <div class="row">
        <div class="col-12">
            <div id="belcms_user" class="card">
                <div class="card-header">
                    <?= $user->user->username; ?>
                </div>
                <div class="card-body">
                    <div id="belcms_user_img">
                        <img src="<?= $user->profils->hight_avatar; ?>">
                        <img src="<?= $user->profils->avatar; ?>" class="rounded float-start" alt="Avatar User">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <nav id="belcms_pages_user_nav">
                <ul>
                    <li>
                        <a href="user">
                            <i class="fa-solid fa-user"></i> Mon profil
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/profils">
                            <i class="fa-solid fa-user-pen"></i> Éditer mon profil
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/social">
                            <i class="fa-solid fa-share-nodes"></i> Éditer Social
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/avatar">
                            <i class="fa-solid fa-image-portrait"></i> Fond & avatar
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/Material">
                            <i class="fa-solid fa-computer"></i> Éditer matériels
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="User/options">
                            <i class="fa-solid fa-gears"></i> Options & sécurité
                            <i class="fa-solid fa-arrows-to-eye" id="belcms_user_nav_active_plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="user/logout">
                            <i class="fa-solid fa-lock-open"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-9">
            <div id="belcms_pages_user_content">
                <div id="belcms_pages_user_content_effect">
                    <h1>Options & sécurité</h1>
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
                                    <input type="text" class="form-control" name="password_new" id="password_new" minlength="6" data-size="32" data-character-set="data-character-set=" a-z,A-Z,0-9,#" required="required">
                                    <span class="input-group-btn">
                                        <button onclick="javascript:generer_password('password_new');" type="button" class="btn btn-default getNewPass">
                                            <span class="fa fa-refresh"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success mt-3" value="Enregister">
                    </form>
                    <div class="alert alert-danger d-flex align-items-center mt-3 mb-2" role="alert">
                        <div><i class="fa-solid fa-circle-exclamation"></i>  La suppression est irréversible, toutes les données seront effacées, sauf les messages, ça sera marqué « utilisateur effacé »</div>
                    </div>
                    <a href="User/deleteAccount" class="btn btn-danger">Supprimer mon compte</a>
                </div>
            </div>
        </div>
    </div>
</section>