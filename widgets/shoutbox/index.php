<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Visitors;
use BelCMS\Requires\Common;
use BelCMS\Core\User;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div id="belcms_widgets_shoutbox">
    <div class="card">
        <div class="card-body" id="belcms_widgets_shoutbox_id">
            <?php
            foreach ($data as $key => $value):
                $user = User::getInfosUserAll($value->hash_key);
                $userAvatar = $user->profils->avatar;
                $userPseudo = $user->user->username;
                $dateMessage = Common::TransformDate($value->date_msg, 'MEDIUM', 'MEDIUM');
            ?>
            <div class="belcms_widgets_shoutbox_id_msg">
                <img src="<?= $userAvatar; ?>" alt="Avatar" class="rounded-circle belcms_tooltip_right" data="<?= $userPseudo; ?>">
                <div class="belcms_widgets_shoutbox_id_msg_id">
                    <span style="float: left;" class="badge bg-secondary"><?= $userPseudo; ?></span>
                    <span style="float: right;" class="badge bg-info text-dark"><?= $dateMessage; ?></span>
                    <span class="belcms_widgets_shoutbox_msg"><?= $value->msg; ?></span>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <form id="belcms_shoutbox_form" methode="post" enctype="multipart/form-data">
		    <input id="belcms_shoutbox_input" type="text" name="text" autocomplete="off" value="" placeholder="Entrer votre texte">
		    <label id="shoutbox_form_file" class="belcms_tooltip_top" data="Uploadé un fichier">
			    <i class="fa-solid fa-link"></i>
			    <input type="file" name="file" accept="image/*, audio/*, video/*,.pdf, .doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
		    </label>
		    <label id="shoutbox_form_image" class="belcms_tooltip_top" data="Uploadé une image">
			    <i class="fa-regular fa-image"></i> <i class="fa-solid fa-link"></i>
			    <input type="file" accept="image/*" name="img" accept="image/*, audio/*, video/*,.pdf, .doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
		    </label>
	    </form>
    </div>
</div>