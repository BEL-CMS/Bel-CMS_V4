<?php
/**
* Bel-CMS [Content management system]
* *  * @version 4.1.1 [PHP8.5]
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
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="card border-0 shadow-sm">
                <!-- HEADER -->
                <div class="card-header bg-white border-bottom py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1"><i class="fa-solid fa-pen-to-square me-2 text-primary"></i>Nouveau message</h5>
                            <small class="text-muted">Envoyer un message à un membre</small>
                        </div>
                        <a href="inbox" class="btn btn-light btn-sm">
                            <i class="fa-solid fa-xmark me-1"></i>Fermer
                        </a>
                    </div>
                </div>
                <!-- FORMULAIRE -->
                <form action="inbox/newsend" method="post" enctype="multipart/form-data">
                    <div class="card-body p-4">
                        <!-- DESTINATAIRE -->
                        <div class="mb-4">
                            <label for="belcms_mails_new_author" class="form-label fw-semibold">
                                <i class="fa-solid fa-user me-1"></i> Destinataire
                            </label>

                            <input type="text" name="author" id="belcms_mails_new_author" class="form-control" placeholder="Rechercher un membre..." autocomplete="off" required>

                            <div class="form-text">Commencez à saisir le nom du membre.</div>

                        </div>
                        <!-- SUJET -->
                        <div class="mb-4">
                            <label for="subject" class="form-label fw-semibold">
                                <i class="fa-solid fa-heading me-1"></i>
                                Sujet
                            </label>

                            <input type="text" name="subject" id="subject" class="form-control" maxlength="150" placeholder="Sujet du message" required>
                        </div>
                        <!-- MESSAGE -->
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">
                                <i class="fa-solid fa-message me-1"></i>Message
                            </label>
                            <textarea name="message" id="message" class="form-control bel_cms_textarea_simple" rows="10" placeholder="Écrivez votre message..."></textarea>
                        </div>
                        <!-- PIECES JOINTES -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fa-solid fa-paperclip me-1"></i>
                                Pièces jointes
                            </label>
                            <div class="border rounded-3 p-3 bg-body-tertiary">
                                <div class="d-flex align-items-center gap-3">
                                    <input type="file" name="attachments" id="attachments" class="d-none">
                                    <label for="attachments" class="btn btn-light border">
                                        <i class="fa-solid fa-paperclip me-2"></i> Ajouter un fichier
                                    </label>
                                    <span id="attachment-name" class="small text-muted">Aucun fichier sélectionné</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FOOTER -->
                    <div class="card-footer bg-white border-top p-3">
                        <div class="row" id="belcms_global_captcha">
                            <div id="belcms_global_captcha_style">
                                <span>Il faut passer par une vérification de sécurité.</span>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text">Résolvez le calcul : <?= $_SESSION['CAPTCHA']['question'] ?? 'Chargement...' ?></span>
                                    <input type="number" name="captcha" class="form-control" placeholder="Votre réponse" required>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="belcms_captcha_container">
                                        <label><?= constant('CAPTCHA_MESSAGE_INDEX'); ?></label>
                                        <input type="range" id="belcms_captcha_slider" min="0" max="100" value="15">
                                        <div id="belcms_captcha_percent">15%</div>
                                        <input type="hidden" name="belcms_captcha_value" id="belcms_captcha_value">
                                        <input type="hidden" name="captcha_value" value="">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="inbox" class="btn btn-light">
                                <i class="fa-solid fa-arrow-left me-2"></i>
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fa-solid fa-paper-plane me-2"></i>
                                Envoyer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>