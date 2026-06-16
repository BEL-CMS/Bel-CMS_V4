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

use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<div class="card mb-4">
    <div class="card-header" id="belcms_header_title">
        <h2><i class="fa-solid fa-angles-right"></i> Support :: #<?= $infos->number_id ?></h2>
        <a href="support" title="home support">Accueil</a>
    </div>
    <div class="card-body py-5 bg-light">
        <h3 id="belcms_title_section"><?= $infos->title ?><br>Créé le <?= Common::TransformDate($infos->created_at, 'SHORT', 'SHORT'); ?> par <?= User::getNameForHash($infos->user_hash_key); ?></h3>
    </div>
</div>
<?php
if($infos->status == 1) {
    $status = '<span class="badge bg-warning text-dark">En attente</span>';
} else if ($infos->status == 2) {
    $status = '<span class="badge bg-info text-dark">En cours</span>';
} else if ($infos->status == 3) {
    $status = '<span class="badge bg-success">Répondu</span>';
} else {
    $status = '<span class="badge bg-warning">En attente</span>';
}
if ($infos->priority == 1) {
    $priority = '<span class="badge bg-danger">Haute</span>';
} elseif ($infos->priority == 2) {
    $priority = '<span class="badge bg-warning text-dark">Normal</span>';
} else {
    $priority = '<span class="badge bg-info text-dark">faible</span>';
}
$firstMsg = $messages[array_key_first($messages)] ?? false;
?>
<div class="card shadow-sm mb-3">
    <div class="card-header">
        <?= $status; ?>
        <span class="badge bg-primary">object</span>
        <?= $priority; ?>
    </div>
    <div class="card-body">
        <div class="belcms_support_text">
            <?= Common::VarSecure($firstMsg->message, true); ?>
        </div>
    </div>
</div>
<?php
unset($messages[0]);
if (!empty($messages)):
foreach ($messages as $key => $value):
    $bgColor = ($value->user_id != $_SESSION['USER']->user->hash_key) ? 'text-white bg-secondary' : null;
?>
    <div class="card shadow-sm mb-3 <?= $bgColor; ?>">
        <div class="card-header">
            <button class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= Common::TransformDate($value->created_at, 'FULL', 'SHORT'); ?>">
                <?= Common::TransformDate($value->created_at, 'FULL', 'SHORT'); ?>
            </button>
        </div>
        <div class="card-body">
            <div class="belcms_support_text">
                <?php echo $key; ?> bg-secondary
                <?= Common::VarSecure($value->message, true); ?>
            </div>
        </div>
    </div>
<?php
endforeach;
endif;
?>

<div class="card shadow-sm">
    <div class="card-header"><?= constant('REPLY'); ?></div>
    <div class="card-body">
        <form method="post" action="support/reply">
            <textarea name="message" class="form-control mb-3 bel_cms_textarea_simple" rows="4"></textarea>
            <input type="hidden" name="id" value="<?= $infos->number_id; ?>">
            <input type="submit" class="btn btn-primary mt-3" value="<?= constant('SEND_REPLY'); ?>">
        </form>
    </div>
</div>
