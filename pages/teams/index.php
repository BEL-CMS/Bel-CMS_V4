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
    <div class="belcms_section_team_list">
        <div class="belcms_section_team_list_img">
            <img src="templates/palacewar_2026/images/qr_code.jpg">
        </div>
        <div class="belcms_section_teams_table">
            <table>
                <tr>
                    <td>Fondée</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td>2001</td>
                </tr>
                <tr>
                    <td>Adhésion</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td>Ouvert</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td>Discord</td>
                </tr>
                <tr>
                    <td>Membres</td>
                    <td class="belcms_section_teams_table_separate">:</td>
                    <td>8</td>
                </tr>
            </table>
            <div class="belcms_section_teams_table_enter">
                <a href="#" title="Team">Entrer</a>
            </div>
        </div>
    </div>
</div>