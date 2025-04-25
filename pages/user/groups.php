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

use BelCMS\Core\User;
use BelCMS\Requires\Common;
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
                <li class="list-group-item"><a href="/User/Social">Social</a></li>
                <li class="list-group-item"><a href="/User/Material">Matériels</a></li>
                <li class="list-group-item active"><a href="/User/Grp">Groupe(s)</a></li>
                <li class="list-group-item"><a href="/User/Logout">Se déconnecter</a></li>
            </ul>
        </div>
    </div>
</div>