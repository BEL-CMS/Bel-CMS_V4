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

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
<section id="belcms_gallery">
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="Gallery"><?= $_SESSION['CONFIG']['CMS_NAME']; ?> :: Galerie de photos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="Gallery">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="Gallery/propose">Proposé</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-light border-bottom pt-3 pb-3 mb-3">
        <div class="container">
            <h1 class="fw-semibold mb-2 belcms_bnv" id="belcms_bnv">Toutes nos photos se trouvent ici.</h1>
            <p class=" lead text-secondary" style="text-align: center;"></p>
        </div>
    </div>

<div class="slider">
  <div class="slides">
    <?php
    foreach ($data as $value):
    ?>
    <div class="slide is-active">
      <div class="card">
        <a data="#img_<?= $value->id; ?>" href="<?= $value->url; ?>" class="glightbox">
        <img src="<?= $value->url; ?>" alt="Image<?= $value->id; ?>">
      </a>
        <div class="info">
          <h3><?= $value->name; ?></h3>
          <p><?= $value->description; ?></p>
                <span class="section_gallery_title_vote">
                    <a href="gallery/addvote/<?= $value->id; ?>">
                        <svg class="svg-inline--fa fa-thumbs-up" aria-hidden="true" focusable="false" data-prefix="far" data-icon="thumbs-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16H286.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"></path>
                        </svg>
                    </a><br>
                    <span>+ <?=$value->vote;?> Vote</span>
                </span>
        </div>
      </div>
    </div>
    <?php
    endforeach;
    ?>
  </div>
  <button class="nav prev" aria-label="Précédent"><span><i class="fa-solid fa-caret-left"></i></span></button>
  <button class="nav next" aria-label="Suivant"><span><i class="fa-solid fa-caret-right"></i></span></button>
</div>






</section>