<?php

use BelCMS\Core\groups;
use BelCMS\Core\Secure;
use BelCMS\Core\Security;
use BelCMS\Requires\Common;

include ROOT . DS . 'assets/country.php';
$password = Common::randomString(8);
?>
<!-- Start:: row-1 -->
    <div class="mb-4 mt-4">
        <h5 class="fw-medium mb-0">Paramètres du profil de <?= $user->user->username; ?></h5>
    </div>
    <div class="card custom-card">
        <div class="card-body">
            <div class="row mt-4 justify-content-center">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills me-3 tab-style-7" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link text-start active" id="main-profile-tab" data-bs-toggle="pill" data-bs-target="#main-profile" type="button" role="tab" aria-controls="main-profile" aria-selected="true"><i class="ri-user-settings-line me-2 align-middle d-inline-block"></i>Profile Principal</button>
                        <button class="nav-link text-start" id="main-profile2-tab" data-bs-toggle="pill" data-bs-target="#main-profile2" type="button" role="tab" aria-controls="main-profile2" aria-selected="false"><i class="ri-user-settings-line me-2 align-middle d-inline-block"></i>Profile Info</button>
                        <button class="nav-link text-start" id="man-password-tab" data-bs-toggle="pill" data-bs-target="#man-password" type="button" role="tab" aria-controls="man-password" aria-selected="false" tabindex="-1"><i class="ri-key-fill me-2 align-middle d-inline-block"></i>Changer le mot de passe</button>
                        <button class="nav-link text-start" id="main-security-tab" data-bs-toggle="pill" data-bs-target="#main-security" type="button" role="tab" aria-controls="main-security" aria-selected="false" tabindex="-1"><i class="ri-lock-2-line me-2 align-center d-inline-block"></i>Sécurité</button>
                        <button class="nav-link text-start" id="main-social-tab" data-bs-toggle="pill" data-bs-target="#main-social" type="button" role="tab" aria-controls="main-social" aria-selected="false" tabindex="-1"><i class="ri-contacts-book-2-line me-2 align-middle d-inline-block"></i>Plateforme de médias sociaux</button>
                        <button class="nav-link text-start" id="main-notifications-tab" data-bs-toggle="pill" data-bs-target="#main-notifications" type="button" role="tab" aria-controls="main-notifications" aria-selected="false" tabindex="-1"><i class="ri-notification-3-line me-2 align-center d-inline-block"></i>Notifications</button>
                        <button class="nav-link text-start" id="main-groups-tab" data-bs-toggle="pill" data-bs-target="#main-groups" type="button" role="tab" aria-controls="main-groups" aria-selected="false" tabindex="-1"><i class="ri-notification-3-line me-2 align-center d-inline-block"></i>Groupes</button>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane show active" id="main-profile" role="tabpanel" tabindex="0" aria-labelledby="main-profile-tab">
                            <form action="registration/updateUser?admin&option=users" method="post">
                                <div class="mb-4 d-sm-flex align-items-center gap-1 flex-wrap">
                                    <span class="mb-0 me-3 avatar avatar-xxl">
                                        <img src="<?= $user->profils->avatar; ?>" alt="" class="profile-img">
                                    </span>
                                    <div class="">
                                        <div class="fw-medium lh-1"><?= $user->user->username; ?></div>
                                        <div class="fs-12 text-muted"><?= $user->user->mail; ?></div>
                                    </div>
                                </div>
                                <div class="row gy-4 mb-4">
                                    <div class="col-xl-12">
                                        <label for="first-name" class="form-label">Pseudonyme / Authentification d'utilisateur</label>
                                        <input type="text" name="username" class="form-control" id="first-name" placeholder="Nom / Pseudonyme" value="<?= $user->user->username; ?>">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="last-name" class="form-label">Prénom réel :</label>
                                        <input type="text" class="form-control" id="last-name" placeholder="Prochainement" disabled>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="user-name" class="form-label">Nom réel :</label>
                                        <input type="text" class="form-control" id="user-name" placeholder="Prochainement" disabled>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="user-name" class="form-label">Code Postal :</label>
                                        <input type="text" class="form-control" id="user-name" placeholder="Prochainement" disabled>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="user-name" class="form-label">Ville :</label>
                                        <input type="text" class="form-control" id="user-name" placeholder="Prochainement" disabled>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">Pays :</label>
                                        <input type="text" id="demo-autocomplete" name="country" autocomplete="array:pays" class="form-control" value="<?= $user->profils->country; ?>">
                                        </select>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="user-tel" class="form-label">Téléphone</label>
                                        <input type="text" class="form-control" id="user-tel" placeholder="Prochainement" disabled>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="alert svg-primary alert-primary alert-dismissible fade show custom-alert-icon shadow-sm" role="alert"> <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#333333">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>
                                            </svg>&emsp;&emsp;Les informations personnelles ne seront jamais rendues publiques.</div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-list">
                                        <input type="hidden" value="<?= $user->user->hash_key; ?>" name="id">
                                        <button type="submit" class="btn btn-warning-gradient btn-wave">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane show" id="main-profile2" role="tabpanel" tabindex="0" aria-labelledby="main-profile2-tab">
                            <form>
                                <div class="row gy-4 mb-4">
                                    <div class="col-xl-6">
                                        <label for="mail" class="form-label">E-mail d'inscription (privé)</label>
                                        <input value="<?= $user->user->mail; ?>" type="email" name="mail" class="form-control" id="mail" placeholder="e-mail d'enregistrement" required>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="user-public" class="form-label">E-mail public</label>
                                        <input value="<?= $user->profils->public_mail; ?>" type="email" name="public_mail" class="form-control" id="user-mail" placeholder="e-mail public">
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="websites" class="form-label">URL</label>
                                        <input type="url" value="<?= $user->profils->websites; ?>" class="form-control" id="websites" placeholder="https://">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <h6 class="fw-medium mb-3">
                                        À propos de vous :
                                    </h6>
                                    <div class="col-xl-12 mb-4">
                                        <textarea class="form-control" id="about" rows="5"><?= $user->profils->info_text; ?></textarea>
                                    </div>
                                    <div class="col-xl-12 mb-4">
                                        <label for="language" class="form-label">Language :</label>
                                        <select class="form-control" name="language" data-trigger id="language" disabled>
                                            <option value="Choice 1" selected>French</option>
                                            <option value="Choice 2">French</option>
                                            <option value="Choice 3">Arabic</option>
                                            <option value="Choice 4">English</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-list">
                                        <button type="button" class="btn btn-secondary-gradient btn-wave">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="man-password" role="tabpanel" tabindex="0" aria-labelledby="man-password-tab">
                            <div>
                                <p class="fs-12 text-muted"><i class="ri-information-line me-2 align-middle d-inline-block text-info"></i>Le mot de passe doit être au minimum de&emsp;<b class="text-success">8 Caractères</b></p>
                                <div class="mb-2">
                                    <label for="new-password" class="form-label">Nouveau mot de passe</label>
                                    <input type="text" value="<?= $password; ?>" minlength="8" maxlength="16" class="form-control" id="new-password" placeholder="Nouveau mot de passe">
                                </div>
                                <div class="mb-4">
                                    <label for="confirm-password" class="form-label">Confirmez le mot de passe</label>
                                    <input type="password" autocomplete="off" value="" minlength="8" maxlength="16" class="form-control" id="confirm-password" placeholder="Confirmez le mot de passe">
                                </div>
                                <div class="btn-list">
                                    <button class="btn btn-primary">Change Password</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="main-security" role="tabpanel" aria-labelledby="main-security-tab" tabindex="0">
                            <div class="d-sm-flex d-block align-items-top mb-4 justify-content-between px-2">
                                <div>
                                    <p class="fs-14 mb-1 fw-medium">Authentification à deux facteurs</p>
                                    <p class="fs-12 text-muted mb-0">Activer l'authentification 2FA par e-mail.</p>
                                </div>
                                <div class="custom-toggle-switch ms-sm-2 ms-0">
                                    <input id="two-step-01" name="2fa" type="checkbox" disabled>
                                    <label for="two-step-01" class="label-primary mb-1"></label>
                                </div>
                            </div>
                            <?php
                            if (in_array(1, $_SESSION['USER']->groups->all_groups)):
                                if ($_SESSION['USER']->user->root == '1') {
                            ?>
                                <div class="d-sm-flex d-block align-items-center mb-4 justify-content-between px-2 gap-2">
                                    <div>
                                        <p class="fs-14 mb-1 fw-medium">Administrateur</p>
                                        <p class="fs-12 text-muted mb-0">Autorisé l'authentification a l'administration</p>
                                    </div>
                                    <?php
                                    $admin = ($user->user->admin == '1') ? 'Désactiver' : 'Activer';
                                    if ($user->user->admin == '1'):
                                    ?>
                                        <a href="registration/admin/<?= $user->user->hash_key; ?>?&option=users&admin=off" class="btn btn-warning btn-wave waves-effect waves-light">
                                            <?= $admin; ?>
                                        </a>
                                    <?php
                                    else:
                                    ?>
                                        <a href="registration/admin/<?= $user->user->hash_key; ?>?&option=users&admin=on" class="btn btn-warning btn-wave waves-effect waves-light">
                                            <?= $admin; ?>
                                        </a>
                                    <?php
                                    endif;
                                    ?>
                                </div>
                            <?php
                                }
                            endif;
                            ?>
                            <div class="d-sm-flex d-block align-items-center mb-4 justify-content-between px-2 gap-2">
                                <div>
                                    <p class="fs-14 mb-1 fw-medium">Désactiver le compte</p>
                                    <p class="fs-12 text-muted mb-0">Le compte restera désactivé jusqu'à ce que vous le réactiviez en vous connectant.</p>
                                </div>
                                <a class="btn btn-outline-info fw-semibold fs-13" href="javascript:void(0);">
                                    Désactivé
                                </a>
                            </div>
                            <div class="d-sm-flex d-block align-items-center mb-4 justify-content-between px-2 gap-2">
                                <div>
                                    <p class="fs-14 mb-1 fw-medium">Supprimer le compte</p>
                                    <p class="fs-12 text-muted mb-0">Si vous supprimez ceci, le compte ne sera plus visible. Et après 15j il sera supprimé completement de la base de données.</p>
                                </div>
                                <a class="btn btn-outline-danger fw-semibold fs-13" href="javascript:void(0);">
                                    Retirer
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane" id="main-social" role="tabpanel" aria-labelledby="main-soccial-tab" tabindex="0">
                            <form>
                                <div class="mt-4">
                                    <label for="links" class="form-label">FaceBook :</label>
                                    <input type="text" name="facebook" class="form-control" id="links" placeholder="https://www.facebook.com/">
                                </div>
                                <div class="mt-4">
                                    <label for="YouTube" class="form-label">YouTube :</label>
                                    <input type="text" name="youtube" class="form-control" id="YouTube" placeholder="https://www.youtube.com/">
                                </div>
                                <div class="mt-4">
                                    <label for="WhatsApp" class="form-label">WhatsApp :</label>
                                    <input type="text" name="whatsapp" class="form-control" id="WhatsApp" placeholder="https://wa.me/1XXXXXXXXXX">
                                </div>
                                <div class="mt-4">
                                    <label for="Instagram" class="form-label">Instagram :</label>
                                    <input type="text" name="instagram" class="form-control" id="Instagram" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Messenger" class="form-label">Messenger :</label>
                                    <input type="text" name="messenger" class="form-control" id="Messenger" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="TiTtok" class="form-label">TiTtok :</label>
                                    <input type="text" name="tiktok" class="form-control" id="TiTtok" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Snapchat" class="form-label">Snapchat :</label>
                                    <input type="text" name="snapchat" class="form-control" id="Snapchat" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Telegram" class="form-label">Telegram :</label>
                                    <input type="text" name="telegram" class="form-control" id="Telegram" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Pinterest" class="form-label">Pinterest :</label>
                                    <input type="text" name="pinterest" class="form-control" id="Pinterest" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="X" class="form-label">X :</label>
                                    <input type="text" name="x_twitter" class="form-control" id="X" placeholder="https://x.com/BelCMS">
                                </div>
                                <div class="mt-4">
                                    <label for="Reddit" class="form-label">Reddit :</label>
                                    <input type="text" name="reddit" class="form-control" id="Reddit" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="LinkedIn" class="form-label">LinkedIn :</label>
                                    <input type="text" name="linkedIn" class="form-control" id="LinkedIn" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Skype" class="form-label">Skype :</label>
                                    <input type="text" name="skype" class="form-control" id="Skype" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Viber" class="form-label">Viber :</label>
                                    <input type="text" name="viber" class="form-control" id="Viber" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Teams" class="form-label">Teams MS :</label>
                                    <input type="text" name="teams_ms" class="form-control" id="Teams" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Discord" class="form-label">Discord :</label>
                                    <input type="text" name="discord" class="form-control" id="Discord" placeholder="">
                                </div>
                                <div class="mt-4">
                                    <label for="Twitch" class="form-label">Twitch :</label>
                                    <input type="text" name="twitch" class="form-control" id="Twitch" placeholder="">
                                </div>
                                <div class="card-footer">
                                    <div class="btn-list">
                                        <button type="button" class="btn btn-orange-gradient btn-wave">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="main-notifications" role="tabpanel" aria-labelledby="main-notifications-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-primary table-striped table-bordered DataTableBelCMS">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>IP</th>
                                            <th>machine</th>
                                            <th>navigateur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($interaction as $v):
                                            switch ($v->status) {
                                                case 'alert':
                                                    $bg = 'background-color: rgba(223, 83, 73, .8) !important;';
                                                    break;

                                                case 'error':
                                                    $bg = 'background-color: rgba(223, 83, 73, .8) !important;';
                                                    break;

                                                case 'success':
                                                    $bg = 'background-color: rgba(106, 189, 110, .8) !important;';
                                                    break;

                                                case 'warning':
                                                    $bg = 'background-color: rgba(255, 170, 43, .8) !important;';
                                                    break;

                                                case 'infos':
                                                    $bg = 'background-color: rgba(42, 167, 246, .8) !important;';
                                                    break;

                                                default:
                                                    $bg = 'background-color: rgba(102, 97, 90, 1) !important;';
                                                    break;
                                            }
                                        ?>
                                            <tr style="<?= $bg; ?>">
                                                <td><?= $v->title; ?> </td>
                                                <td><?= $v->message; ?></td>
                                                <td><?= $v->date_insert; ?> </td>
                                                <td><?= $v->IP; ?></td>
                                                <td><?= $v->machine; ?> </td>
                                                <td><?= $v->navigateur; ?></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="main-groups" role="tabpanel" tabindex="0" aria-labelledby="main-groups-tab">
                            <form action="registration/updategroups?admin&option=users" method="post">
                                <p><b>Groupe principal</b></p>
                                <select name="main_groups" class="form-select" tabindex="-1">
                                    <?php
                                    foreach (Security::getGroups() as $key => $value):
                                    $title = defined(strtoupper($value)) ? constant(strtoupper($value)) : $value;
                                    $main_groups = $key == $user->groups->user_group ? 'selected="selected"': '';
                                    ?>
                                    <option <?=$main_groups?> value="<?=$key?>"><?=$title?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                                <br>
                                <p><b>Groupe secondaire</b></p><br>
                                <?php
                                $arrayAccess = $user->groups->all_groups;
                                $groups = groups::getGroups();
                                foreach ($groups as $key => $value):
                                    $name = defined($value->name) ? constant($value->name) : $value->name;
                                    $checked = (in_array($value->id_group, $arrayAccess)) ? "checked" : '';
                                ?>
                                    <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                        <input value="<?= $value->id_group; ?>" name="access[]" id="toggleswitchLight_<?= $value->id_group; ?>" type="checkbox" <?= $checked; ?>>
                                        <label for="toggleswitchLight_<?= $value->id_group; ?>" class="label-warning"></label>
                                        <span class="ms-3">Activer <?= $name; ?></span>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                                <div class="card-footer">
                                    <input type="hidden" name="hash_key"  value="<?=$user->user->hash_key; ?>">
                                    <div class="btn-list">
                                        <button type="submit" class="btn btn-orange-gradient btn-wave">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    var cAutocomplete = {
        sDescription: "autcomplete class"
    };
    cAutocomplete.complete = function(hEvent) {
        if (hEvent == null) {
            var hEvent = window.hEvent
        }
        var hElement = (hEvent.srcElement) ? hEvent.srcElement : hEvent.originalTarget;
        var sAA = hElement.getAttribute("autocomplete").toString();
        if (sAA.indexOf("array:") >= 0) {
            hArr = eval(sAA.substring(6))
        } else {
            if (sAA.indexOf("list:") >= 0) {
                hArr = sAA.substring(5).split("|")
            }
        }
        if (hEvent.keyCode == 16) {
            return
        }
        var sVal = hElement.value.toLowerCase();
        if (hEvent.keyCode == 8 || hEvent.keyCode == 46) {
            sVal = sVal.substring(0, sVal.length - 1)
        }
        if (sVal.length < 1) {
            return
        }
        for (var nI = 0; nI < hArr.length; nI++) {
            sMonth = hArr[nI];
            nIdx = sMonth.toLowerCase().indexOf(sVal, 0);
            if (nIdx == 0 && sMonth.length > sVal.length) {
                hElement.value = hArr[nI];
                if (hElement.createTextRange) {
                    hRange = hElement.createTextRange();
                    hRange.findText(hArr[nI].substr(sVal.length));
                    hRange.select()
                } else {
                    hElement.setSelectionRange(sVal.length, sMonth.length)
                }
                return
            }
        }
    };
    cAutocomplete.init = function() {
        var a = 0;
        var c = document.getElementsByTagName("INPUT");
        for (var a = 0; a < c.length; a++) {
            if (c[a].type.toLowerCase() == "text") {
                var b = c[a].getAttribute("autocomplete");
                if (b) {
                    if (document.attachEvent) {
                        c[a].attachEvent("onkeyup", cAutocomplete.complete)
                    } else {
                        if (document.addEventListener) {
                            c[a].addEventListener("keyup", cAutocomplete.complete, false)
                        }
                    }
                }
            }
        }
    };
    if (window.attachEvent) {
        window.attachEvent("onload", cAutocomplete.init)
    } else {
        if (window.addEventListener) {
            window.addEventListener("load", cAutocomplete.init, false)
        }
    };
    var pays = ["Afghanistan", "Afrique-du-Sud", "Albanie", "Algérie", "Allemagne", "Andorre", "Angola", "Anguilla", "Antarctique", "Antigua-et-Barbuda", "Arabie-saoudite", "Argentine", "Arménie", "Aruba", "Australie", "Autriche", "Azerbaïdjan", "Bahamas", "Bahreïn", "Bangladesh", "Barbade", "Belgique", "Belize", "Bénin", "Bermudes", "Bhoutan", "Biélorussie", "Bolivie", "Bosnie-Herzégovine", "Botswana", "Brésil", "Brunéi-Darussalam", "Bulgarie", "Burkina-Faso", "Burundi", "Cambodge", "Cameroun", "Canada", "Cap-Vert", "Ceuta-et-Melilla", "Chili", "Chine", "Chypre", "Colombie", "Comores", "Congo-Brazzaville", "Congo-Kinshasa", "Corée-du-Nord", "Corée-du-Sud", "Costa-Rica", "Côte-d’Ivoire", "Croatie", "Cuba", "Curaçao", "Danemark", "Diego-Garcia", "Djibouti", "Dominique", "Égypte", "El-Salvador", "Émirats-arabes-unis", "Équateur", "Érythrée", "Espagne", "Estonie", "État-de-la-Cité-du-Vatican", "États-fédérés-de-Micronésie", "États-Unis", "Éthiopie", "Fidji", "Finlande", "France", "Gabon", "Gambie", "Géorgie", "Ghana", "Gibraltar", "Grèce", "Grenade", "Groenland", "Guadeloupe", "Guam", "Guatemala", "Guernesey", "Guinée", "Guinée-équatoriale", "Guinée-Bissau", "Guyana", "Guyane-française", "Haïti", "Honduras", "Hongrie", "Île-Christmas", "Île-de-l’Ascension", "Île-de-Man", "Île-Norfolk", "Îles-Åland", "Îles-Caïmans", "Îles-Canaries", "Îles-Cocos", "Îles-Cook", "Îles-Féroé", "Îles-Géorgie-du-Sud-et-Sandwich-du-Sud", "Îles-Malouines", "Îles-Mariannes-du-Nord", "Îles-Marshall", "Îles-mineures-éloignées-des-États-Unis", "Îles-Salomon", "Îles-Turques-et-Caïques", "Îles-Vierges-britanniques", "Îles-Vierges-des-États-Unis", "Inde", "Indonésie", "Irak", "Iran", "Irlande", "Islande", "Israël", "Italie", "Jamaïque", "Japon", "Jersey", "Jordanie", "Kazakhstan", "Kenya", "Kirghizistan", "Kiribati", "Kosovo", "Koweït", "La-Réunion", "Laos", "Lesotho", "Lettonie", "Liban", "Libéria", "Libye", "Liechtenstein", "Lituanie", "Luxembourg", "Macédoine", "Madagascar", "Malaisie", "Malawi", "Maldives", "Mali", "Malte", "Maroc", "Martinique", "Maurice", "Mauritanie", "Mayotte", "Mexique", "Moldavie", "Monaco", "Mongolie", "Monténégro", "Montserrat", "Mozambique", "Myanmar", "Namibie", "Nauru", "Népal", "Nicaragua", "Niger", "Nigéria", "Niue", "Norvège", "Nouvelle-Calédonie", "Nouvelle-Zélande", "Oman", "Ouganda", "Ouzbékistan", "Pakistan", "Palaos", "Panama", "Papouasie-Nouvelle-Guinée", "Paraguay", "Pays-Bas", "Pays-Bas-caribéens", "Pérou", "Philippines", "Pitcairn", "Pologne", "Polynésie-française", "Porto-Rico", "Portugal", "Qatar", "R.A.S.-chinoise-de-Hong-Kong", "R.A.S.-chinoise-de-Macao", "République-centrafricaine", "République-dominicaine", "République-tchèque", "Roumanie", "Royaume-Uni", "Russie", "Rwanda", "Sahara-occidental", "Saint-Barthélemy", "Saint-Christophe-et-Niévès", "Saint-Marin", "Saint-Martin-(partie-française)", "Saint-Martin-(partie-néerlandaise)", "Saint-Pierre-et-Miquelon", "Saint-Vincent-et-les-Grenadines", "Sainte-Hélène", "Sainte-Lucie", "Samoa", "Samoa-américaines", "Sao-Tomé-et-Principe", "Sénégal", "Serbie", "Seychelles", "Sierra-Leone", "Singapour", "Slovaquie", "Slovénie", "Somalie", "Soudan", "Soudan-du-Sud", "Sri-Lanka", "Suède", "Suisse", "Suriname", "Svalbard-et-Jan-Mayen", "Swaziland", "Syrie", "Tadjikistan", "Taïwan", "Tanzanie", "Tchad", "Terres-australes-françaises", "Territoire-britannique-de-l’océan-Indien", "Territoires-palestiniens", "Thaïlande", "Timor-oriental", "Togo", "Tokelau", "Tonga", "Trinité-et-Tobago", "Tristan-da-Cunha", "Tunisie", "Turkménistan", "Turquie", "Tuvalu", "Ukraine", "Uruguay", "Vanuatu", "Venezuela", "Vietnam", "Wallis-et-Futuna", "Yémen", "Zambie", "Zimbabwe"];
    cAutocomplete.init();
</script>