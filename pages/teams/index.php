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
        <h2><i class="fa-solid fa-angles-right"></i> Teams</h2>
        <a href="Teams" title="home guestbook">Accueil</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section">Bienvenue sur la section des Teams.</h3>
    </div>
</div>

<div id="belcms_section_teams">
    <?php
        foreach ($teams as $key => $value):
    ?>
    <div class="belcms_section_team_list">
        <div class="belcms_section_team_list_img">
            <img src="<?= $value->logo; ?>" alt="Team Logo <?= $value->name; ?>">
        </div>
        <div class="belcms_section_teams_table">
            <table>
                <tr>
                    <td class="belcms_section_teams_table_title">Team</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td class="belcms_section_teams_table_value"><?= $value->name; ?></td>
                </tr>
                <tr>
                    <td class="belcms_section_teams_table_title">Fondée</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td class="belcms_section_teams_table_value"><?= Common::TransformDate($value->foundation, 'MEDIUM'); ?></td>
                </tr>
                <tr>
                    <td class="belcms_section_teams_table_title">Adhésion</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td class="belcms_section_teams_table_value">Ouvert</td>
                </tr>
                <tr>
                    <td class="belcms_section_teams_table_title">Contact</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td class="belcms_section_teams_table_value"><a href="<?= $value->contact; ?>" title="Team <?= $value->name; ?>"><?= $value->contact; ?></a></td>
                </tr>
                <tr>
                    <td class="belcms_section_teams_table_title">Membres</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td class="belcms_section_teams_table_value"><?= $value->count; ?></td>
                </tr>
            </table>
            <div class="belcms_section_teams_table_enter">
                <a href="teams/detail/<?= $value->id ?>/<?= Common::MakeConstant($value->name); ?>" title="Team - <?= $value->name; ?>">Entrer</a>
            </div>
        </div>
    </div>
    <?php
    endforeach;
    ?>
</div>