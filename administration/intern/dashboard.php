<?php

/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;
use BelCMS\Core\groups;

if (isset($_SESSION['LOGIN_MANAGEMENT']) && $_SESSION['LOGIN_MANAGEMENT'] === true):
function getCountNews() {
    $sql = new BDD();
    $sql->table('TABLE_NEWS');
    $sql->where(array('name'=> 'author', 'value' => $_SESSION['USER']->user->hash_key));
    $sql->count();
    return $sql->data;
}
function getCountImg() {
    $sql = new BDD();
    $sql->table('TABLE_GALLERY');
    $sql->where(array('name'=> 'author', 'value' => $_SESSION['USER']->user->hash_key));
    $sql->count();
    return $sql->data;
}
function getCountDls() {
    $sql = new BDD();
    $sql->table('TABLE_DOWNLOADS');
    $sql->where(array('name'=> 'uploader', 'value' => $_SESSION['USER']->user->hash_key));
    $sql->count();
    return $sql->data;
}

$nameG   = groups::getName($_SESSION['USER']->groups->user_group);
$nameG   = isset($nameG->name) ? constant($nameG->name) : $nameG->name;
$country = !empty($_SESSION['USER']->profils->country) ? $_SESSION['USER']->profils->country : 'Non renseigner';
?>
<div class="position-relative mb-5">
    <div class="overflow-hidden rounded-3">
        <img src="administration/assets/images/pages/profile-bg.jpg" alt="Profile Background" class="w-100 profile-bg object-fit-cover">
    </div>
    <div class="card position-absolute bottom-0 start-0 end-0 z-1 m-3 border-0 shadow-none">
        <div class="card-body p-md-8">
            <div class="story-ring h-96px w-96px rounded-circle d-flex justify-content-center align-items-center position-absolute top-0 start-50 translate-middle">
                <img src="<?= $_SESSION['USER']->profils->avatar; ?>" alt="Avatar" class="h-90px w-90px rounded-circle border-3 border border-white">
            </div>
            <div class="d-xl-flex gap-2 flex-shrink-0 position-absolute bottom-0 start-50 translate-middle-x mb-5 d-none">
                <button type="button" class="btn icon-btn btn-primary"><i class="uil uil-facebook-f"></i></button>
                <button type="button" class="btn icon-btn btn-secondary"><i class="uil uil-twitter"></i></button>
                <button type="button" class="btn icon-btn btn-success"><i class="uil uil-dribbble"></i></button>
            </div>
            <div class="d-flex justify-content-center justify-content-xl-between flex-wrap align-items-center gap-6">
                <div class="mt-10 mt-xl-0 text-center text-xl-start">
                    <h5 class="mb-1 fs-17"><?= $_SESSION['USER']->user->username; ?><i class="bi bi-patch-check-fill fs-16 ms-1 text-secondary"></i></h5>
                    <p class="text-muted mb-4"><?= $nameG; ?></p>
                    <div class="d-flex gap-1 gap-md-3 flex-wrap text-muted">
                        <div class="d-flex gap-2 align-items-center">
                            <i class="uil uil-location-point text-primary"></i><?= $country; ?>
                        </div>
                        <span>|</span>
                        <div class="d-flex gap-2 align-items-center">
                            <i class="uil uil-envelope text-primary"></i> 
                            <a href="mailto:<?= $_SESSION['USER']->user->mail; ?>?subject=sujets&body=Bonjour%2C" class="text-muted"><?= $_SESSION['USER']->user->mail; ?></a>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-0 d-none d-md-block">
                    <div class="d-flex flex-column justify-content-center align-items-center gap-1 w-144px text-center border-end">
                        <h4 class="mb-1 fs-21"><?= getCountNews(); ?></h4>
                        <span class="text-muted">News</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center gap-1 w-144px text-center border-end">
                        <h4 class="mb-1 fs-21"><?= getCountImg(); ?></h4>
                        <span class="text-muted">Images</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center gap-1 w-144px text-center">
                        <h4 class="mb-1 fs-21"><?= getCountDls(); ?></h4>
                        <span class="text-muted">Téléchargements</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endif;
