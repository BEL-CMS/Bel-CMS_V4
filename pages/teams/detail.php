<?php
/**
* Bel-CMS [Content management system]
* @version 4.0.1 [PHP8.4]
* @link https://bel-cms.dev
* @link https://determe.be
* @license MIT License
* @copyright 2015-2026 Bel-CMS
* @author as Stive - stive@determe.be
*/

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="card">
    <div class="card-header" id="belcms_header_title">
        <h2><i class="fa-solid fa-gamepad"></i> Team <?= $team['team']['name']; ?></h2>
        <a href="Teams" title="home guestbook">Accueil</a>
    </div>
    <div class="card-body bg-light">
        <img id="belcms_team_screen" src="<?= $team['team']['screen']; ?>" alt="screen - <?= $team['team']['name']; ?>">
    </div>
</div>

<table class="table table-dark table-striped table-hover" id="belcms_team_table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Grade</th>
            <th>Rejoins</th>
            <th>Profils</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($team['users'] as $key => $value):
        ?>
        <tr>
            <td><?= $value['author']; ?></td>
            <td><?= $value['rank']; ?></td>
            <td><?= Common::TransformDate($value['date_join'], 'MEDIUM'); ?></td>
            <td><a class="btn btn-secondary btn-sm" href="Members/detail/<?= $value['author']; ?>" title="Membres - <?= $value['author']; ?>"><i class="fa-solid fa-address-card"></i></a></td>
        </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>