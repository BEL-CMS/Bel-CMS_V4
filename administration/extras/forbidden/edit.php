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
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Editer un e-mails interdit
                    </div>
                </div>
                <div class="card-body">
                    <form action="forbidden/sendEdit?management&amp;option=extras" method="post">
                        <div class="form-floating mb-3">
                            <input name="mail" required="required" type="text" class="form-control" id="mail" required value="<?= $data->name; ?>">
                            <label for="title">Edition e-mail</label>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $data->id; ?>">
                            <button type="submit" class="btn btn-primary">Editer</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="alert alert-danger border border-danger mb-0 p-2">
                        <div class="d-flex align-items-start">
                            <div class="me-2 svg-danger">
                                <div class="text-danger w-100">
                                    <div class="mb-1">Entrez seulement le nom de domaine sans l'extension (.eu & .com & .be etc...)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>