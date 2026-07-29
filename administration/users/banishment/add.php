<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
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
                <div class="top-left"></div>
                <div class="top-right"></div>
                <div class="bottom-left"></div>
                <div class="bottom-right"></div>
                <div class="card-header">
                    <div class="card-title">
                        Liste des bannissements
                    </div>
                </div>
                <form action="banishment/sendadd/?management&option=users" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input name="email" type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="">
                                <label for="floatingInputGrid">Adresse email</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea class="bel_cms_textarea_full" name="reason">Vous avez été banni pour la raison suivante :</textarea>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <select name="tirme" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected="">Ouvrir le menu - temps du ban</option>
                                <option value="0"><?=constant('LIFE');?></option>
                                <option value="PT1M"><?=constant('ONE_MINUTE');?></option>
                                <option value="PT5M"><?=constant('FIVE_MINUTES');?></option>
                                <option value="PT15M"><?=constant('FIFTEEN_MINUTES');?></option>
                                <option value="PT1H"><?=constant('ONE_O_CLOCK');?></option>
                                <option value="P1D"><?=constant('A_DAY');?></option>
                                <option value="P7D"><?=constant('ONE_WEEK');?></option>
                                <option value="P1M"><?=constant('A_MONTH');?></option>
                                <option value="P6M"><?=constant('SIX_MONTHS');?></option>
                                <option value="P1Y"><?=constant('TEN');?></option>
                            </select>
                            <label for="floatingSelect"><?=constant('DATE_OF_BAN');?></label>
                        </div>
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input name="ip" type="text" class="form-control" id="floatingInputIPV" placeholder="xxx.xxx.xxx.xxx" value="">
                                <label for="floatingInputIPV">IPV4 - IPV6</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Bannir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>