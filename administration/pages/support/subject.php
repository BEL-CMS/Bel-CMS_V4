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
<div class="card-body">
    <div class="row">
        <div class="col-xl-8">
            <div class="card custom-card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class="table-success">
                                <th>#ID</th>
                                <th>Nom du sujets</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($subject as $key => $value):
                            ?>
                            <tr>
                                <td><?= $value->id; ?></td>
                                <td><?= $value->value; ?></td>
                                <td align="center">
                                    <button class="btn btn-gradient-info rounded-pill" data-bs-target="#modal_<?= $value->id; ?>" data-bs-toggle="modal" type="button">Editer</button>
                                    <div class="modal fade" id="modal_<?= $value->id; ?>" tabindex="-1" aria-labelledby="modal_<?= $value->id; ?>" aria-hidden="true">
                                        <form action="support/editsubject/?Admin&option=pages" method="post">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Changer le nom</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input name="name" type="text" class="form-control" id="title" placeholder="Nom du sujet" value="<?= $value->value; ?>">
                                                            <label for="title">Entrer le nom du sujet</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                        <input type="hidden" name="id" value="<?= $value->id; ?>">
                                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn bg-gradient-danger rounded-pill" data-bs-target="#modal_del_<?= $value->id; ?>" data-bs-toggle="modal" type="button">Supprimer</button>
                                    <div class="modal fade" id="modal_del_<?= $value->id; ?>" tabindex="-1" aria-labelledby="modal_<?= $value->id; ?>" aria-hidden="true">
                                        <form action="support/delsubject/?Admin&option=pages" method="post">
                                            <div class="modal-dialog">
                                                <div class="modal-body text-center mb-3">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <div class="mb-1">
                                                                <img src="/assets/img/error.png" alt="deltelogo" class="h-90 w-79 object-fit-cover">
                                                            </div>
                                                            <h5 class="f-w-600 mb-2">Es-tu sûr</h5>
                                                            <p class="f-s-16 mb-1 text-muted">Cette action supprimera toutes vos informations.</p>
                                                            <p class="f-s-16 mb-2 text-muted">Vous ne pourrez pas revenir en arrière !</p>
                                                            <div>
                                                                <input type="hidden" name="id" value="<?= $value->id; ?>">
                                                                <button class="btn  btn-danger  btn-sm" data-bs-dismiss="modal" type="submit">Oui, supprimez-le</button>
                                                                <button class="btn  btn-outline-danger  btn-sm" data-bs-dismiss="modal" type="button">Annulé</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <form action="support/sendnewsubject?management&option=pages" method="post">
                <div class="card custom-card">
                    <div class="card-header">Ajouter un sujet</div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input name="name" required="required" type="text" class="form-control" id="title" placeholder="Nom du sujet">
                            <label for="title">Entrer le nom du sujet</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-gradient-success">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>