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

use BelCMS\Requires\Common;

?>
<section id="belcms_downloads">
    <table class="table table-striped table-hover" id="DataTableBelCMS">
        <thead>
            <tr>
                <th scope="col">
                    Nom
                </th>
                <th scope="col">
                    Taille
                </th>
                <th scope="col">
                    Date
                </th>
                <th scope="col">
                    Vu
                </th>
                <th scope="col">
                    Télécharger
                </th>
                <th scope="col">
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $data):
                if (is_readable($data->screen)) {
                    $img = $data->screen;
                    $img = '<img src="' . $img . '" class="card-img-top" alt="image ' . $data->name . '">';
                } else {
                    $img = 'assets/img/no_img_fullwide.webp';
                    $img = '<img src="' . $img . '" class="card-img-top" alt="image no image">';
                }
                $size = Common::ConvertSize($data->size);
            ?>
                <tr>
                    <td><?= $data->name; ?></td>
                    <td><?= $size; ?></td>
                    <td><?= Common::TransformDate($data->date, 'FULL', 'MEDIUM'); ?></td>
                    <td><?= $data->view; ?></td>
                    <td><?= $data->dls; ?></td>
                    <td><a class="btn btn-secondary belcms_btn_downloads" href="downloads/viewdl/<?= $data->id; ?>">Voir</a></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</section>
<script src="/assets/plugins/jQuery/jquery-3.7.1.min.js"></script>
<script src="/assets/plugins/DataTables-2.3.4/datatables.min.js"></script>
<script src="/assets/plugins/DataTables-2.3.4/datatable.fr.js"></script>