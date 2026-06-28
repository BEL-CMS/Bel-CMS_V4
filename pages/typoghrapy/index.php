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
<div id="belcms_Typoghrapy_test">
    <i>Test des balises H</i>
    <h1>Teste H1</h1><br>
    <h2>Teste H2</h2><br>
    <h3>Teste H3</h3><br>
    <h41>Teste H4</h4><br>
    <h5>Teste H5</h5><br>
    <h6>Teste H6</h6><br>
    <hr>
    <i>Teste des balises a (liens)</i>
    <a href="#" title="#">Teste</a>
    <hr>
</div>