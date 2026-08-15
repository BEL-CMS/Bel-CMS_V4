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

use BelCMS\Core\Notification;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

?>
<div class="container-fluid py-4">
    <div class="row g-3">
        <!-- ===================================================== -->
        <!-- COLONNE GAUCHE : MENU -->
        <!-- ===================================================== -->
        <div class="col-12 col-lg-2">
            <div class="card belcms-inbox-sidebar border-0 shadow-sm">
                <div class="card-body">
                    <a href="inbox/new"
                       class="btn btn-primary w-100 mb-4">
                        Nouveau<br>message
                    </a>
                    <div class="nav flex-column nav-pills">
                        <a href="inbox"
                           class="nav-link active">
                            <i class="fa-solid fa-inbox me-2"></i>
                            Boîte de réception
                        </a>
                        <a href="inbox/sent" class="nav-link"><i class="fa-solid fa-paper-plane me-2"></i> Envoyés</a>
                        <a href="inbox/drafts" class="nav-link"><i class="fa-solid fa-file-lines me-2"></i> Brouillons</a>

                        <a href="inbox/trash" class="nav-link"><i class="fa-solid fa-trash me-2"></i> Corbeille</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===================================================== -->
        <!-- COLONNE CENTRALE : LISTE DES MESSAGES -->
        <!-- ===================================================== -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Messages</h5>
                        <button class="btn btn-sm btn-light">
                            <i class="fa-solid fa-rotate"></i>
                        </button>
                    </div>
                </div>
                <div class="list-group list-group-flush belcms-message-list">
                    <?php
                    foreach ($data as $value):
                        foreach ($value->infos as $v):
                            $value->message = strip_tags($value->message);
                        if (isset($content[0]) and  $value->message_id == $content[0]->message_id):
                        ?>
                        <a href="inbox?number_id=<?= $v->message_id;?>"; class="list-group-item list-group-item-action read">
                            <div class="d-flex">
                                <div class="message-avatar me-3">
                                    <img src="<?= $value->avatar; ?>">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <div class="d-flex justify-content-between">
                                        <span><?=  $value->sender_id; ?></span>
                                        <small class="text-muted"><?= Common::TransformDate($value->created_at, 'MEDIUM', 'MEDIUM'); ?></small>
                                    </div>
                                    <div class="message-subject"><?= $value->subject; ?></div>
                                </div>
                            </div>
                        </a>
                        <?php
                        else:
                        ?>
                        <a href="inbox?number_id=<?= $v->message_id;?>" class="list-group-item list-group-item-action unread">
                            <div class="d-flex">
                                <div class="message-avatar me-3">ST</div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <div class="d-flex justify-content-between">
                                        <strong>Stive</strong>
                                        <small class="text-muted">12:04</small>
                                    </div>
                                    <div class="message-subject">
                                        Modification de Bel-CMS
                                    </div>
                                    <div class="message-preview">
                                        Bonjour, voici les dernières modifications...
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                        endif;
                        endforeach;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
        <!-- ===================================================== -->
        <!-- COLONNE DROITE : LECTURE DU MESSAGE -->
        <!-- ===================================================== -->
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <?php
                if (!empty($content)):
                ?>
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1"><?= $content[0]->subject; ?></h5>
                            <small class="text-muted">Date : <?= Common::TransformDate($content[0]->created_at, 'MEDIUM', 'MEDIUM'); ?></small>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-light" title="Répondre">
                                <i class="fa-solid fa-reply"></i>
                            </button>
                            <button class="btn btn-light" title="Supprimer">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            <button class="btn btn-light" title="Options">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="message-content">
                        <?php foreach ($content as $key => $value): ?>
                            <?php
                            $isMe = ($value->sender_id === $_SESSION['USER']->user->hash_key);
                            ?>
                            <div class="d-flex mb-4 <?= $isMe ? 'justify-content-end' : 'justify-content-start' ?>">
                                <div style="max-width:75%;min-width:75%;">
                                    <div class="d-flex align-items-center mb-1 <?= $isMe ? 'justify-content-end' : '' ?>">

                                        <?php if (!$isMe): ?>

                                            <div class="message-avatar me-2">
                                                <?= strtoupper(substr($value->username, 0, 2)); ?>
                                            </div>

                                            <strong>
                                                <?= htmlspecialchars($value->username); ?>
                                            </strong>

                                            <small class="text-muted ms-2">
                                                le <?= Common::TransformDate($value->created_at,'MEDIUM', 'MEDIUM'); ?>
                                            </small>

                                        <?php else: ?>

                                            <small class="text-muted me-2">
                                                le <?= Common::TransformDate($value->created_at,'MEDIUM', 'MEDIUM'); ?>
                                            </small>

                                            <strong>
                                                Vous
                                            </strong>

                                            <div class="message-avatar ms-2">
                                                <?= strtoupper(substr($value->username, 0, 2)); ?>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                    <!-- MESSAGE -->
                                    <div class="p-3
                                        <?= $isMe ? 'bg-primary text-white rounded-start rounded-bottom' : 'bg-body-tertiary border rounded-end rounded-bottom' ?>">
                                        <?= $value->message; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php 
                ?>
                <!-- REPONSE RAPIDE -->
                <form method="post" enctype="multipart/form-data" action="inbox/reply">
                    <div class="card-footer bg-white border-0">
                        <div class="border rounded p-3">
                            <textarea name="message" class="form-control border-0 shadow-none bel_cms_textarea_simple" rows="3" placeholder="Écrire une réponse..."></textarea>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div>
                                    <input type="file" name="attachment" id="attachment" class="d-none" accept="image/*">
                                    <label for="attachment" class="btn btn-light btn-sm" title="Ajouter une pièce jointe">
                                        <i class="fa-solid fa-paperclip"></i>
                                    </label>
                                </div>
                                <input type="hidden" value="<?= $content[0]->key_secret; ?>" name="key_secret">
                                <input type="hidden" value="<?= $content[0]->subject; ?>" name="subject">
                                <input type="hidden" value="<?= $content[0]->message_id; ?>" name="message_id">
                                <input type="hidden" value="<?= $content[0]->sender_id; ?>" name="recipient_id">

                                <button class="btn btn-primary" type="submit">
                                    <i class="fa-solid fa-paper-plane me-2"></i> Réponse
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                else:
                ?>
                <div class="card-header bg-white border-0 py-3">
                <?php
                    Notification::infos('Aucune sélection de message effectuée.', 'Message');
                ?>
                </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>