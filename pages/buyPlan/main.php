<?php
/**
 * Bel-CMS [Content management system]
 * *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Notification;
?>
<div class="col-12">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex">
            <h2 class="h5 mb-0"><i class="fa-brands fa-edge-legacy"></i> Web Hosting</h2>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <th>Serial d'achat</th>
                    <th>Site Principal</th>
                    <th>Plan</th>
                    <th>PHP Version</th>
                    <th>Date de fin</th>
                    <th>Voir +</th>
                </thead>
                <tbody>
                    <?php
                    if (empty($web)):
                    ?>
                    <tr>
                        <td colspan="6">
                        <?php
                            Notification::infos('Aucun hébérgement en cours...');
                        ?>
                        </td>
                    </tr>
                    <?php
                    else:
                    foreach ($web as $key => $value):
                        $now = new DateTime();
                        $date = new DateTime($value->date_end);
                        $verifyDate = ($date < $now) ? 'style="background:red;color:#FFF;"' : 'style="background:green;color:#FFF;"';
                    ?>
                    <tr>
                        <td><?= $value->unique_key; ?></td>
                        <td><?= $value->website_1; ?></td>
                        <td><?= $value->plan; ?></td>
                        <td><?= $value->phpversion; ?></td>
                        <td <?= $verifyDate; ?>><?= $value->date_end; ?></td>
                        <td align="center"><a href="buyPlan/view/<?= $value->unique_key; ?>" style="color:green"><i class="fa-solid fa-file-lines"></i></a></td>
                    </tr>
                    <?php
                    endforeach;
                    endif;
                    ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>