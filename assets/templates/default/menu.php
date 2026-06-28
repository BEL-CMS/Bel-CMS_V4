<?php
use BelCMS\Core\User;
?>
<nav>
    <ul class="no-list-style">
        <li>
            <a href="index.php">Accueil</a>
        </li>
        <li>
            <a href="forum">Forum</a>
        </li>
        <li>
            <a href="gallery">Images</a>
        </li>
        <li>
            <a href="#" class="act-link">Pages <i class="fa-solid fa-caret-down"></i></a>
            <ul>
                <li><a href="downloads">Téléchargements</a></li>
                <li><a href="guestbook">Livre d'or</a></li>
            </ul>
        </li>
        <?php
        if (isset($_SESSION['USER'])):
        ?>
            <li>
                <a href="#" class="act-link">Utilisateur <i class="fa-solid fa-caret-down"></i></a>
                <ul>
                    <li><a href="user">Profil</a></li>
                </ul>
            </li>
            <li><a href="index.php?admin">Administration</a></li>
        <?php
        else:
        ?>
            <li>
                <a href="#" class="">Utilisateur <i class="fa-solid fa-caret-down"></i></a>
                <ul>
                    <li><a href="user/login&echo" title="Login">Login</a></li>
                    <li><a href="User/registred?echo" title="inscription">Inscription</a></li>
                    <li><a href="User/passwordLost&echo" title="MDP Perdu">Mot de passe perdu</a></li>
                </ul>
            </li>
        <?php
        endif; 
        ?>
    </ul>
</nav>