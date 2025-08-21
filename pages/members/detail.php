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
use BelCMS\Core\groups;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;
?>
 <div class="belcms_members_wrapper">
    <aside class="belcms_members_sidebar">
      <img src="<?= $user->profils->avatar; ?>" alt="Photo de Stive" class="belcms_members_avatar">
      <h1 class="belcms_members_name"><?= $user->user->username; ?></h1>
    </aside>

    <main class="belcms_members_main">
      <section class="belcms_members_section">
        <h2 class="belcms_members_title">À propos</h2>
        <p class="belcms_members_text"><?= $user->profils->info_text; ?></p>
      </section>
        <section class="belcms_members_section">
        <h2 class="belcms_members_title">Profil utilisateur</h2>
            <table class="table table-hover belcms_members_table">
                <tbody>
                    <tr>
                        <td>Nom d'utilisateur</td>
                        <td><?= $user->user->username; ?></td>
                    </tr>
                    <tr>
                        <td>Date d'inscription</td>
                        <td><?= Common::TransformDate($user->profils->date_registration, 'FULL', 'MEDIUM'); ?></td>
                    </tr>
                    <tr>
                        <td>La derniere visite sur le site</td>
                        <?php if (isset($user->page->last_visit)) {
                            $date = Common::TransformDate($user->page->last_visit, 'FULL', 'MEDIUM');
                        } else {
                            $date = '';
                        }
                        ?>
                        <td><?= $date ?></td>
                    </tr>
                    <tr>
                        <td>La date à laquelle vous êtes né</td>
                        <td><?= Common::TransformDate($user->profils->birthday, 'FULL', 'NONE'); ?></td>
                    </tr>
                    <tr>
                        <td>Pays</td>
                        <td><?= $user->profils->country; ?></td>
                    </tr>
                    <tr>
                        <td>Discord</td>
                        <td><?= $user->social->discord; ?></td>
                    </tr>
                    <tr>
                        <td>FaceBook</td>
                        <td><?= $user->social->facebook; ?></td>
                    </tr>
                    <tr>
                        <td>X (Twitter)</td>
                        <td><?= $user->social->x_twitter; ?></td>
                    </tr>
                    <tr>
                        <td>youTube</td>
                        <td><?= $user->social->youtube; ?></td>
                    </tr>
                    <tr>
                        <td>Twitch</td>
                        <td><?= $user->social->twitch; ?></td>
                    </tr>
                    <tr>
                        <td>Site internet</td>
                        <td><a href="<?= $user->profils->websites; ?>" target="_blank"><?= $user->profils->websites; ?></a></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="belcms_members_section">
        <h2 class="belcms_members_title">Matériel utilisé</h2>
            <table class="table table-hover belcms_members_table">
                <thead>
                    <tr>
                        <th style="text-align: center;" colspan="2">Configuration Materiel informatique</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Connexion internet</td>
                        <td><?= $user->hardware->internet_connection; ?></td>
                    </tr>
                    <tr>
                        <td>Système d'exploitation</td>
                        <td><?= $user->hardware->OS; ?></td>
                    </tr>
                    <tr>
                        <td>Boitier PC</td>
                        <td><?= $user->hardware->tower; ?> : <?= $user->hardware->model_tower; ?></td>
                    </tr>
                    <tr>
                        <td>Souris</td>
                        <td><?= $user->hardware->mouse; ?></td>
                    </tr>
                    <tr>
                        <td>Alimentation</td>
                        <td><?= $user->hardware->psu; ?> : <?= $user->hardware->watt; ?></td>
                    </tr>
                    <tr>
                        <td>Refroidissement</td>
                        <td><?= $user->hardware->cooling; ?> : <?= $user->hardware->model_cooling; ?></td>
                    </tr>
                    <tr>
                        <td>Processeur</td>
                        <td><?= $user->hardware->cpu; ?> : <?= $user->hardware->model_cpu; ?></td>
                    </tr>
                    <tr>
                        <td>Mémoire vive</td>
                        <td><?= $user->hardware->ram; ?> : <?= $user->hardware->model_ram; ?> : <?= $user->hardware->qty_ram; ?></td>
                    </tr>
                    <tr>
                        <td>Carte mère</td>
                        <td><?= $user->hardware->motherboard; ?> : <?= $user->hardware->model_motherboard; ?></td>
                    </tr>
                    <tr>
                        <td>Carte graphique</td>
                        <td><?= $user->hardware->graphics_card; ?> : <?= $user->hardware->model_graphics_card; ?></td>
                    </tr>
                    <tr>
                        <td>Disque HDD/SSD/NMVE</td>
                        <td><?= $user->hardware->ssd_m2; ?> : <?= $user->hardware->size_hdd; ?></td>
                    </tr>
                </tbody>
            </table>
        </section>
      <section class="belcms_members_section">
        <h2 class="belcms_members_title">Groupe(s)</h2>
        <ul class="belcms_members_tags">
        <?php 
        $group = $user->groups->all_groups;
        foreach ($group as $key => $value):
            $groups = Groups::getName($value);
            $nameGroups = (defined($groups->name)) ? constant($groups->name) : $groups->name;
            ?>
            <li><?= $nameGroups; ?></li>
            <?php
        endforeach;
        ?>
        </ul>
      </section>
    </main>
  </div>