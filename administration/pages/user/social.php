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
                <img style="max-width: 100%;" src="<?= $_SESSION['USER']->profils->avatar; ?>" class="rounded float-start" alt="Avatar User">
            </div>
            <ul id="belcms_user_ul" class="list-group list-group-flush">
                <li class="list-group-item"><a href="/User">Accueil</a></li>
                <li class="list-group-item"><a href="/User/profils">Profils</a></li>
                <li class="list-group-item"><a href="/User/avatar">Avatar</a></li>
                <li class="list-group-item"><a href="/User/mdp">Mot de passe</a></li>
                <li class="list-group-item active"><a href="/User/Social">Social</a></li>
                <li class="list-group-item"><a href="/User/Material">Matériels</a></li>
                <li class="list-group-item"><a href="/User/Grp">Groupe(s)</a></li>
                <li class="list-group-item"><a href="/User/Logout">Se déconnecter</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <form action="/user/submitsocial" method="post">
                <div class="card-header">Modifier vos réseaux sociaux</div>
                <div class="card-body">
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="facebook" type="text" placeholder="Entrer votre Facebook" value="<?= $social->facebook; ?>" pattern="^[a-z\d\.]{5,}$" class="form-control">
                            <label><i class="fa-brands fa-facebook"></i> Facebook</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="x_twitter" type="text" placeholder="Entrer votre (X) Twitter" value="<?= $social->x_twitter; ?>" pattern="^[A-Za-z0-9_]{1,15}$" class="form-control">
                            <label><i class="fa-brands fa-x-twitter"></i> Twitter</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="discord" type="text" placeholder="Entrer votre Discord" value="<?= $social->discord; ?>" class="form-control">
                            <label><i class="fa-brands fa-discord"></i> Discord</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="pinterest" type="text" placeholder="Entrer votre Pinterest" value="<?= $social->pinterest; ?>" class="form-control">
                            <label><i class="fa-brands fa-pinterest"></i> Pinterest</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="linkedIn" type="text" placeholder="Entrer votre LinkedIn" value="<?= $social->linkedIn; ?>" class="form-control">
                            <label><i class="fa-brands fa-linkedin-in"></i> LinkedIn</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="youtube" type="text" placeholder="Entrer votre YouTube" value="<?= $social->youtube; ?>" class="form-control">
                            <label><i class="fa-brands fa-youtube"></i> YouTube</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="whatsapp" type="text" placeholder="Entrer votre Whatsapp" value="<?= $social->whatsapp; ?>" class="form-control">
                            <label><i class="fa-brands fa-whatsapp"></i> Whatsapp</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="instagram" type="text" placeholder="Entrer votre Instagram" value="<?= $social->instagram; ?>" class="form-control">
                            <label><i class="fa-brands fa-instagram"></i> Instagram</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="messenger" type="text" placeholder="Entrer votre Messenger (Meta)" value="<?= $social->messenger; ?>" class="form-control">
                            <label><i class="fa-brands fa-facebook-messenger"></i> Messenger (Meta)</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="tiktok" type="text" placeholder="Entrer votre TikTok" value="<?= $social->tiktok; ?>" class="form-control">
                            <label><i class="fa-brands fa-tiktok"></i> TikTok</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="snapchat" type="text" placeholder="Entrer votre SnapChat" value="<?= $social->snapchat; ?>" class="form-control">
                            <label><i class="fa-brands fa-snapchat"></i> SnapChat</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="telegram" type="text" placeholder="Entrer votre Telegram" value="<?= $social->telegram; ?>" class="form-control">
                            <label><i class="fa-brands fa-telegram"></i> Telegram</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="reddit" type="text" placeholder="Entrer votre Reddit" value="<?= $social->reddit; ?>" class="form-control">
                            <label><i class="fa-brands fa-reddit"></i> Reddit</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="skype" type="text" placeholder="Entrer votre Skype" value="<?= $social->skype; ?>" class="form-control">
                            <label><i class="fa-brands fa-skype"></i> Skype</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="viber" type="text" placeholder="Entrer votre Viber" value="<?= $social->viber; ?>" class="form-control">
                            <label><i class="fa-brands fa-viber"></i> Viber</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="teams_ms" type="text" placeholder="Entrer votre Teams ms" value="<?= $social->teams_ms; ?>" class="form-control">
                            <label><i class="fa-brands fa-windows"></i> Teams ms</label>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input name="twitch" type="text" placeholder="Entrer votre Twitch" value="<?= $social->twitch; ?>" class="form-control">
                            <label><i class="fa-brands fa-twitch"></i> Twitch</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>