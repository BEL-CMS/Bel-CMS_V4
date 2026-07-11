<?php

/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
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
use BelCMS\Core\Notification;

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

function getCountForum() {
    $sql = new BDD();
    $sql->table('TABLE_FORUM_MSG');
    $sql->where(array('name'=> 'author', 'value' => $_SESSION['USER']->user->hash_key));
    $sql->count();
    return $sql->data;
}

function getCountIntertaction() {
    $sql = new BDD();
    $sql->table('TABLE_INTERACTION_ADMIN');
    $sql->orderby(array(array('name' => 'id', 'type' => 'DESC')));
    $sql->limit(5);
    $sql->queryAll();
    return $sql->data;
}

function getCountBan ()
{
    $sql = new BDD;
    $sql->table('TABLE_BAN');
    $sql->limit(5);
    $sql->orderby(array(array('name' => 'id', 'type' => 'DESC')));
    $sql->queryAll();
    $return = $sql->data;
    return $return;
}

$nameG   = groups::getName($_SESSION['USER']->groups->user_group);
$nameG   = isset($nameG->name) ? constant($nameG->name) : $nameG->name;
$country = !empty($_SESSION['USER']->profils->country) ? $_SESSION['USER']->profils->country : 'Non renseigner';
?>
<div class="col-md-6 col-xl-12">
    <div class="card equal-card">
        <div class="card-body">
            <div class="profile-container">
                <div class="image-details">
                    <div class="profile-pic mx-auto">
                        <div class="avatar-preview">
                            <div id="imgPreview" style="background-image: url(<?= $_SESSION['USER']->profils->avatar; ?>) !important;"></div>
                        </div>
                    </div>
                </div>
                <div class="person-details">
                    <h5 class="f-w-600"><?= $_SESSION['USER']->user->username; ?></h5>
                    <p><?= $nameG; ?></p>
                    <div class="details">
                        <div>
                            <h4 class="text-primary"><?= getCountImg(); ?></h4>
                            <p class="text-secondary">Images</p>
                        </div>
                        <div>
                            <h4 class="text-primary"><?= getCountNews(); ?></h4>
                            <p class="text-secondary">News</p>
                        </div>
                        <div>
                            <h4 class="text-primary"><?= getCountForum(); ?></h4>
                            <p class="text-secondary">Forum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4">
    <div class="col-lg-6 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="">Activités récentes dans l'administration.</h5>
            </div>
            <div class="card-body">
                <?php
                foreach (getCountIntertaction() as $key => $value):
                ?>
                <div class="d-flex align-items-center gap-3 justify-content-between mb-2">
                    <span class="bg-light-primary h-35 w-35 d-flex-center flex-shrink-0 b-r-50">
                        <i class="ti ti-user f-s-24"></i>
                    </span>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 f-s-15"><?= $value->title; ?></h6>
                        <p class="text-secondary mb-0 f-s-13 txt-ellipsis-1"><?= $value->message; ?></p>
                    </div>
                    <p class="mb-0 text-secondary txt-ellipsis-1"><?= Common::TransformDate($value->date_insert, 'LONG', 'MEDIUM'); ?></p>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4">
    <div class="col-lg-6 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="">Bannissements effectifs.</h5>
            </div>
            <div class="card-body">
                <?php
                foreach (getCountBan() as $key => $value):
                    $ban = ($value->reason == '<p>Vous avez été banni pour la raison suivante :</p>' or $value->reason == null) ? 'Bannissements automatiques par le système' : $value->reason;
                    $ban = strip_tags($ban);
                ?>
                <div class="d-flex align-items-center gap-3 justify-content-between mb-2">
                    <div class="flex-grow-1">
                        <h6 class="mb-0 f-s-15"><?= $value->ip; ?></h6>
                        <p class="text-secondary mb-0 f-s-13 txt-ellipsis-1"><?= $ban; ?></p>
                    </div>
                    <?php
                    $time = strtoupper($value->timeban);
                    $time = defined($time) ? constant($time) : $time;
                    ?>
                    <p class="mb-0 text-secondary txt-ellipsis-1"><?= $time; ?></p>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4">
    <div class="col-lg-6 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="">Les actions que vous avez récemment effectuées en lignes.</h5>
            </div>
            <div class="card-body">
                <?php
                Notification::alert('Pas disponible pour l\'instant.');
                ?>
            </div>
        </div>
    </div>
</div>
<?php
endif;
