<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="card-body">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Liste des inscriptions aux tests d'admission « BBSA/BSSA »
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap w-100 DataTableBelCMS">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date de naissance</th>
                                    <th>N° Registre national</th>
                                    <th>N° GSM</th> 
                                    <th>E-mail</th>
                                    <th>Date / Lieu</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <body>
                            <?php
                            foreach ($data as $key => $value):
                            ?>
                            <tr>
                                <td><?= $value['name']; ?></td>
                                <td><?= $value['username']; ?></td>
                                <td><?= Common::TransformDate($value['birthday'],'FULL'); ?></td>
                                <td><?= $value['national_number']; ?></td>
                                <td><?= $value['gsm']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= Common::TransformDate($value['date_inscription'], 'FULL'); ?> - <?= $value['lieu']; ?></td>
                                <td>
                                    <button class="btn bg-gradient-danger rounded-pill" data-bs-target="#modal_del_<?= $value['id']; ?>" data-bs-toggle="modal" type="button">Supprimer</button>
                                    <div class="modal fade" id="modal_del_<?= $value['id']; ?>" tabindex="-1" aria-labelledby="modal_<?= $value['id']; ?>" aria-hidden="true">
                                        <form action="bbsa/deluser?Admin&option=aseh" method="post">
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
                                                                <input type="hidden" name="id" value="<?= $value['id']; ?>">
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
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>