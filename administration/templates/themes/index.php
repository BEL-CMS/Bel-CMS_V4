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
<div class="col-xl-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-xl-12 col-xxl-12">
                                <div class="card-header pe-md-0">
                                    <h5 class="card-title">Thèmes</h5>
                                </div>
                            </div>
                            <div class="col-xl-5 col-xxl-4 mt-5 ">
                                <div class="card-body ps-5">
                                    <div class="p-5 bg-light bg-opacity-20 rounded-3 border">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="card-title">Template par défaut</h5>
                                        </div>
                                        <img src="/assets/templates/default/capture.png" alt="TPL default" class="glightbox img-fluid rounded-2 mb-4 h-200px w-100 object-fit-cover">
                                        <div class="py-4">
                                            <h6 class="mb-4">Information</h6>
                                            <div class="d-flex mb-2">
                                                <span class="text-muted">Nb° colonne</span>
                                                <p class="ms-auto mb-0">2</p>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <span class="text-muted">Couleur dominante</span>
                                                <p class="ms-auto mb-0">Vert</p>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <span class="text-muted">Menu</span>
                                                <p class="ms-auto mb-0">Via un fichier custom</p>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <span class="text-muted">Date Update</span>
                                                <p class="ms-auto mb-0">12-03-2026</p>
                                            </div>
                                        </div>
                                        <p class="mb-0"><a class="btn btn-primary" href="#">Séléctionné</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>