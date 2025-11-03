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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<?php include ('header.php'); ?>
  <div class="my-5">
    <div class="row g-4">
      <?php
        foreach ($threads as $key => $value):
        ?>
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header bg-white d-flex align-items-center">
            <i class="<?= $value->icon; ?> text-primary me-2"></i>
            <h2 class="h5 mb-0"><?= $value->title; ?></h2>
          </div>
          <div class="card-body">
            <?php if (!empty($value->subtitle)): ?>
              <p class="text-secondary mb-4"><?= $value->subtitle; ?></p>
            <?php endif; ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
              <?php
              foreach ($value->subCat as $sub):
              ?>
              <div class="col">
                <a class="subcat card h-100 border-0" href="forum/category/<?= $sub->id_supp; ?>">
                  <div class="card-body">
                    <h3 class="h6 mb-1"><i class="<?= $sub->icon; ?>"></i> <?= $sub->title; ?></h3>
                    <p class="small text-secondary mb-2"><?= $sub->subtitle; ?></p>
                    <span class="badge bg-primary-subtle text-primary me-2"><?= $sub->nbsubcat; ?> sujets</span>
                    <span class="badge bg-success-subtle text-success"><?= $sub->nbMsg;?> messages</span>
                  </div>
                </a>
              </div>
              <?php
              endforeach;
              ?>
            </div>
          </div>
          <div class="card-footer bg-white small text-secondary">
          </div>
        </div>
      </div>
        <?php
        endforeach;
      ?>
    </div>
  </div>
  <?php
  include ('footer.php');
