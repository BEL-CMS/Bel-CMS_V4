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

use BelCMS\Core\Comment;
use BelCMS\Core\Notification;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

if (empty($data)) {
    Notification::alert('Le fichier est inexistant', 'Téléchargement');
    return;
}
if (file_exists(constant('ROOT_DOC').$data->screen)) {
    $img = $data->screen;
    $img = '<img src="'.$img.'" class="card-img-top" alt="image '.$data->name.'">';
} else {
    $img = 'assets/img/no_img_fullwide.webp';
    $img = '<img src="'.$img.'" class="card-img-top" alt="image no image">';
}
if (User::ifUserExist($data->uploader)) {
    $uploader = User::getInfosUserAll($data->uploader);
    $color    = User::colorUsername($data->uploader);
    $uploader = $uploader->user->username;
} else {
    $uploader = 'Utilisateur suprimer';
    $color    = '#FFF';
}
?>
<section id="belcms_downloads">
    <div class="card mb-3" style="width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <?=$img;?>
            </div>
            <div class="col-md-8">
                <div class="card-body no_margin">
                    

  <div class="belcms_table">
    <div class="belcms_header">
      <div class="belcms_cell">Utilisateur</div>
      <div class="belcms_cell">Contact</div>
    </div>

    <div class="belcms_row">
      <div class="belcms_cell">
        <div class="belcms_subcell">
          <div class="belcms_label">Nom : </div>
          <div class="belcms_value"><?= $data->name; ?></div>
        </div>
        <div class="belcms_subcell">
          <div class="belcms_label">Publié par :</div>
          <div style="color: <?=$color;?>" class="belcms_value"><?= $uploader; ?></div>
        </div>
      </div>
      <div class="belcms_cell">
        <div class="belcms_subcell">
          <div class="belcms_label">Vu : </div>
          <div class="belcms_value"><?= $data->view; ?></div>
        </div>
        <div class="belcms_subcell">
          <div class="belcms_label">Date de publication :</div>
          <div class="belcms_value"><?= $data->date; ?></div>
        </div>
      </div>
    </div>

    <div class="belcms_row">
      <div class="belcms_cell">
        <div class="belcms_subcell">
          <div class="belcms_label">Catégorie</div>
          <div class="belcms_value"><?= $data->idcat; ?></div>
        </div>
        <div class="belcms_subcell">
          <div class="belcms_label">Date</div>
          <div class="belcms_value"><?= Common::TransformDate($data->date, 'LONG', 'NONE'); ?></div>
        </div>
      </div>
      <div class="belcms_cell">
        <div class="belcms_subcell">
          <div class="belcms_label">Commentaires :</div>
          <div class="belcms_value"><?= Comment::countComments('downloads', $data->id); ?></div>
        </div>
        <div class="belcms_subcell">
          <div class="belcms_label">Fichier télécharger : </div>
          <div class="belcms_value"><?= $data->dls; ?></div>
        </div>
      </div>
    </div>
    <div id="belcms_description"><?= $data->description; ?></div>
  
                </div>
            </div>
            <div class="card-footer">
                <?php
                if (User::isLogged() === true):
                ?>
                <button type="button" class="btn btn-info" onclick="location.href='Downloads/getDownload/<?= $data->id; ?>&echo'">Télécharger</button>
                <?php
                else:
                Notification::warning('Il est nécessaire d\'être authentifié afin de télécharger le fichier.', 'Login');
                endif;
                ?>
            </div>
        </div>
        <?php
        $comments = new Comment;
        $comments->html();
        ?>
    </div>
</section>