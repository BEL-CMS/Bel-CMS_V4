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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="mb-3">
    <blockquote class="blockquote custom-blockquote danger mb-0 text-center" style="border: 2px solid rgb(var(--danger-rgb));">
        <h6>Infomation Message</h6>
        <div class="alert alert-success border border-warning mb-0 p-2">
            <div class="d-flex align-items-start">
                <div class="me-2 svg-danger">
                </div>
                <div class="text-danger w-100">
                    <div class="fw-medium d-flex justify-content-between">Admiistration<button type="button" class="btn-close p-0" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>
                    <div class="fs-12 op-8 mb-1" style="color:#FFF;font-size: 16px;">L'administration n'est pas entièrement achevée, et certains aspects ne fonctionnent pas correctement.
                    </div>
                </div>
            </div>
        </div>
    </blockquote>
</div>