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

?>
<section id="belcms_guestbook">
    <div class="container">
        <div class="row">
            <?php
            foreach ($guest as $v):
            ?>
            <div class="col-lg-6 col-sm-12 col-xsm-12 belcms_guestbook_block">
                <div id="belcms_guestbook_table">
                    <div class="belcms_guestbook_user">
                        <a href="#" title="#"><?= $v->author; ?></a>
                        <div class="date"><?= Common::TransformDate($v->date_insert, 'FULL', 'MEDIUM'); ?></div>
                        <div class="belcms_guestbook_message">
                            <?= $v->message; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            ?>
            <div class="col-lg-12 col-sm-12 col-xsm-12">
                <form action="Guestbook/new" method="post" class="mt-2">
                    <?php
                    if (isset($_SESSION['USER']) and User::ifUserExist($_SESSION['USER']->user->hash_key) == true):
                        $input = '<input name="user" type="text" readonly value="' . $_SESSION['USER']->user->username . '" class="form-select mb-2">';
                    else:
                        $input = '<input name="user" type="text" readonly value="' . Common::GetIp() . '" class="form-select mb-2">';
                    endif;
                    ?>
                    <?= $input; ?>
                    <div class="input-group mb-2">
                        <textarea name="msg" class="bel_cms_textarea_simple"></textarea>
                    </div>
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="captcha"><?= $_SESSION['CAPTCHA']['CODE']; ?></label>
                        <input type="number" placeholder="Trouve la solution du calcul." name="captcha" class="form-control" id="captcha">
                    </div>
                    <div>
                        <input type="hidden" name="captcha_value" value="">
                        <input type="submit" class="btn btn-warning" value="<?= constant('SEND'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>