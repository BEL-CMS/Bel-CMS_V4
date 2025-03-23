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

$list = array();
$path = "uploads/users/" . $_SESSION['USER']->user->hash_key . "/avatar/";
$list = Common::ScanFiles($path);
$i    = 0;
?>
<div class="row">
    <div class="col-sm-4">
        <div id="belcms_user" class="card">
            <div class="card-header">
                <img style="max-width: 100%;" src="<?= $_SESSION['USER']->profils->avatar; ?>" class="rounded float-start" alt="Avatar User">
            </div>
            <ul id="belcms_user_ul" class="list-group list-group-flush">
                <li class="list-group-item"><a href="/User">Accueil</a></li>
                <li class="list-group-item active"><a href="/User/profils">Profils</a></li>
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
            <div class="card-header">Informations des avatars</div>
            <div class="card-body">
                <table id="belcms_table_user" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">formats de l'images</th>
                            <th scope="col">Image(s)</th>
                            <th scope="col" colspan="2">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $file):
                            $i = $i + 1;
                            if (preg_match("#\.(jpg|jpeg|png|gif|bmp|tif|webp)$#i", $file)):
                                $img = '/uploads/users/' . $_SESSION['USER']->user->hash_key . '/avatar/' . $file;
                                $extension = pathinfo($img, PATHINFO_EXTENSION);
                        ?>
                                <form>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $extension; ?></td>
                                        <td>
                                            <picture>
                                                <?php
                                                if ($extension == 'webp'):
                                                ?>
                                                    <source srcset="<?= $img; ?>" type="image/webp" />
                                                    <img src=" <?= $img; ?>" class="glightbox">
                                                <?php
                                                else:
                                                ?>
                                                    <img src="<?= $img; ?>" class="glightbox">
                                                <?php
                                                endif;
                                                ?>
                                            </picture>
                                        </td>
                                        <td><a class="btn btn-success active_img" data-file="<?= $img; ?>"><i class="fa-solid fa-display"></i></a></td>
                                        <td><a class="btn btn-danger delete_img" data-file="<?= $img; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                </form>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <form action="/User/sendNewAvatar" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="multiplefiles">100px / 100px</label>
                        <input type="file" name="avatar" class="form-control" id="multiplefiles" accept="image/*,.webp" />
                    </div>
                    <div class="input-group">
                        <input type="submit" class="btn btn-success" value="Uploader">
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="form-check form-switch">
                    <?php
                    $gravatar = User::getInfosUserAll($_SESSION['USER']->user->hash_key)->profils->gravatar;
                    $gravatar = $gravatar != false ? 'checked' : '';
                    ?>
                    <form action="/User/changeGravatar" method="POST">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="gravatar" id="belcmsGravatar" <?= $gravatar; ?>>
                            <label class="form-check-label" for="belcmsGravatar">Utilisé Gravatar <a style="color:red;text-decoration: none;" href="https://fr.gravatar.com"> * fr.gravatar.com/</a></label>
                        </div>
                        <div class="input-group row">
                            <input type="submit" class="btn btn-success" value="Sauvegarder">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>