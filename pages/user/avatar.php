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

use BelCMS\Requires\Common;

$list = array();
$path = "uploads/users/" . $_SESSION['USER']->user->username . "/avatar/";
$list = Common::ScanFiles($path);
$i    = 0;
foreach ($avatar as $key => $value) {
    $defaultAvatar[] = 'assets'.DS.'img'.DS.'avatar'.DS.$value;
}
if (empty($user->profils->hight_avatar)) {
    $user->profils->hight_avatar = constant('DEFAULT_HIGHT_AVATAR');
}
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
                    <li class="active">
                        <a href="User/avatar">
                            <i class="fa-solid fa-image-portrait"></i> Fond & avatar
                            <i class="fa-solid fa-arrows-to-eye" id="belcms_user_nav_active_plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="User/Material">
                            <i class="fa-solid fa-gears"></i> Options & sécurité
                            <i class="fa-solid fa-circle-arrow-right fa-buzz" class="belcms_user_nav_hover"></i>
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
                    <h1>Profils</h1>
                    <table id="belcms_pages_user_content_table" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Extension</th>
                                <th scope="col">Image(s)</th>
                                <th scope="col" colspan="2">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list as $file):
                                $i = $i + 1;
                                if (preg_match("#\.(jpg|jpeg|png|gif|bmp|tif|webp)$#i", $file)):
                                    $img = 'uploads/users/' . $_SESSION['USER']->user->username . '/avatar/' . $file;
                                    $extension = pathinfo($img, PATHINFO_EXTENSION);
                                    $url = $_SERVER['DOCUMENT_ROOT'].DS.$img;
                                    $url = str_replace('\\', '/', $url);
                            ?>
                                <tr>
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
                                    <td>
                                        <a class="btn btn-danger delete_img" data-file="<?= $url; ?>"><i class="fa-solid fa-trash-can"></i></a> - 
                                        <a class="btn btn-success active_img" data-file="<?= $img; ?>"><i class="fa-solid fa-display"></i></a>
                                    </td>
                                </tr>
                            <?php
                                endif;
                            endforeach;
                            // Chemin du dossier à analyser
                            $dossier = 'assets/img/avatar/'; 
                            $images = glob($dossier . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
                                foreach ($images as $image) {
                                    $extensionImg = pathinfo($image, PATHINFO_EXTENSION);
                                ?>
                                <tr>
                                    <td><?= $extensionImg; ?></td>
                                    <td><picture><img src="<?= $image; ?>" class="glightbox"></picture></td>
                                    <td colspan="2"><a class="btn btn-success active_img" data-file="/<?= $image; ?>"><i class="fa-solid fa-display"></i></a></td>
                                </tr>
                                <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <form action="/User/sendNewAvatar" method="POST" enctype="multipart/form-data" class="belcms_user_form">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="multiplefiles">Avatar 100px / 100px</label>
                        <input type="file" name="avatar" class="form-control" id="" accept="image/*,.webp" />
                    </div>
                    <div class="input-group">
                        <input type="submit" class="btn btn-success" value="Uploader">
                    </div>
                </form>
                <hr class="belcms_user_hr">
                <div>
                    <img style="max-width: 95%;" src="<?= $user->profils->hight_avatar; ?>">
                </div>
                <form action="/User/sendNewHigh" method="POST" enctype="multipart/form-data" class="belcms_user_form">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="multiplefiles">Fond 1920px / 1080px max !</label>
                        <input type="file" name="hight_avatar" class="form-control" id="" accept="image/*,.webp" />
                    </div>
                    <div class="input-group">
                        <input type="submit" class="btn btn-success" value="Uploader">
                    </div>
                </form>
        <div class="card mt-3">
            <div class="card-body">
                <div class="form-check form-switch">
                    <?php
                    $gravatar = $user->profils->gravatar;
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
    </div>
</section>