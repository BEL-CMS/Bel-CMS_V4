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
<div class="card mb-4">
    <div class="card-header" id="belcms_header_title">
        <h2><i class="fa-solid fa-angles-right"></i> Support</h2>
        <a href="support/create" title="créé un support">Créer un ticket</a>
        <a href="support" title="home support">Accueil</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section">Posez vos questions ici et j'y répondrai dans les plus brefs délais.</h3>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr style="font-weight:bold;">
                    <th>ID</th>
                    <th>Sujet</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                    <th>Dernière MAJ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1024</td>
                    <td>Problème de connexion</td>
                    <td><span class="badge bg-warning">En attente</span></td>
                    <td><span class="badge bg-danger">Haute</span></td>
                    <td>15/06/2026</td>
                    <td><a href="support/view/" class="btn btn-outline-primary">Ouvrir</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
