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
        <h2><i class="fa-solid fa-angles-right"></i> Support :: #123456</h2>
        <a href="support" title="home support">Accueil</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section">Problème de connexion<br>Créé le 15/06/2026 par Stive</h3>
    </div>
</div>

<div class="card shadow-sm mb-3">
    <div class="card-header">
        <span class="badge bg-warning">En attente</span>
        <span class="badge bg-primary">object</span>
        <span class="badge bg-danger">Haute</span>
    </div>
    <div class="card-body">
        <div id="belcms_support_text">
            <p>Bonjour, je n’arrive plus à me connecter à mon compte administrateur.</p>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header">Répondre</div>
    <div class="card-body">
        <form method="post" action="support/reply">
            <textarea name="text" class="form-control mb-3 bel_cms_textarea_simple" rows="4"></textarea>
            <input type="submit" class="btn btn-primary mt-3" value="Envoyer la réponse">
        </form>
    </div>
</div>
