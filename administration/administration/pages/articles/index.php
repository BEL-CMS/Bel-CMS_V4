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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="row">
    <?php
    foreach ($cat as $v):
        if (User::ifUserExist($v->author)) {
            $getUser  = User::getInfosUserAll($v->author);
            $username = $getUser->user->username;
            $avatar   = $getUser->profils->avatar;
        } else {
            $username = 'Compte utilisateur retiré';
            $avatar   = '/assets/img/default_avatar.jpg';
        }
        $description = empty($v->description) ? '<p></p>' : $v->description;
    ?>
        <div class="col-12 col-sm-4 col-xl-4;">
            <div class="kanban-tasks" id="todo-tasks">
                <div id="todo-tasks-draggable" data-view-btn="todo-tasks">
                    <div class="card custom-card" style="height: 195px;">
                        <div class="top-left"></div>
                        <div class="top-right"></div>
                        <div class="bottom-left"></div>
                        <div class="bottom-right"></div>
                        <div class="card-body p-0">
                            <div class="p-3 kanban-board-head">
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="fw-medium mb-0"><?= $v->name; ?></h6>
                                    </div>
                                    <div class="dropdown">
                                        <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-more-vertical align-middle"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="articles/view/<?= $v->id_articles; ?>?admin&option=pages" class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line me-1 align-middle d-inline-block"></i>Voir</a></li>
                                            <li><a class="dropdown-item" href="articles/del/<?= $v->id_articles; ?>?admin&option=pages"><i class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Supprimer</a></li>
                                            <li><a class="dropdown-item" href="articles/add/<?= $v->id_articles; ?>?Admin&option=pages"><i class="ri-edit-line me-1 align-middle d-inline-block"></i>Ajouter un article</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="task-badges"><span class=" bg-primary-transparent">#CODE ID</span><span class="ms-1 text-warning bg-danger-transparent"><?= $v->id_articles; ?></span></div>
                                <div class="kanban-content mt-2">
                                    <div class="d-flex justify-content-between gap-2">
                                        <div class="fs-11 mb-1"><i class="ri-calendar-line me-1 align-middle d-inline-block op-7"></i>Date: <?= Common::TransformDate($v->publish, 'FULL', 'MEDIUM'); ?> </div>
                                        <div class="fs-11"><i class="ri-progress-5-line me-1 align-middle d-inline-block op-7"></i>Nb° pages: <span class="text-warning"><?= $v->countpage; ?></span></div>
                                    </div>
                                    <div class="kanban-task-description op-8 mb-1" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 550px;n"><?= $description; ?></div>
                                </div>
                            </div>
                            <div class="p-3 border-top border-block-start-dashed">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="avatar-list-stacked">
                                        <span class="avatar avatar-sm avatar-rounded">
                                            <img src="<?= $avatar; ?>" alt="<?= $username; ?>">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>