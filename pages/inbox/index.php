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
?>
<section id="belcms_section_inbox">
    <div id="belcms_inbox_sidebar">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Composer</button>
        <a href="#"><i class="fa-solid fa-inbox"></i>&ensp;Boîte de réception</a>
        <a href="#"><i class="fa-solid fa-envelope"></i>&ensp;Archive</a>
        <a href="#"><i class="fa-solid fa-trash-can-arrow-up"></i>&ensp;Corbeille</a>
    </div>
    <div id="belcms_inbox_body">
        <table id="belcms_inbox_items">
            <?php
            foreach ($data as $key => $value):
                if ($value->archive == 0):
                ?>
                    <tr>
                        <td class="belcms_inbox_items_msg bg-secondary bg-gradient">
                            <label class="form-check-label" for="flexCheckIndeterminate1">
                                <span class="badge rounded-pill bg-success belcms_tooltip_left" data="Nouveau message">Nouveau</span>
                                <img src="<?= $_SESSION['USER']->profils->avatar; ?>" class="belcms_inbox_avatar belcms_tooltip_left" alt="avatar" data="Utilisateur">
                                <a class="text-dark" href="#">message dans la boite de réception</a>
                                <span class="belcms_inbox_items_date">lun,18-12-2025 à 16h10</span>
                            </label>
                        </td>
                    </tr>
                <?php
                endif;
            endforeach;
            ?>
        </table>
    </div>
</section>