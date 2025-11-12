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
<div id="belcms_calendar">
    <?php
    foreach ($data as $key => $value):
        if ($value->end_date == $value->start_date) {
            $date = $value->start_date;
            $date = Common::TransformDate($date, 'MEDIUM', 'NONE');
            $dateFinal = $date;
        } else {
            $dateFinal = '';
            $date1 = Common::TransformDate($value->start_date, 'MEDIUM', 'NONE');
            $date2 = Common::TransformDate($value->end_date, 'MEDIUM', 'NONE');
            $dateFinal .= $date1;
            $dateFinal .= '&nbsp; - &nbsp;';
            $dateFinal .= $date2;
        }

            if (is_readable(constant('ROOT').DS.$value->image)) {
                $file = $value->image;
            } else {
                $file = '/assets/img/no_image_events.png';
            }
    ?>
        <div class="belcms_calendar_item">
            <div class="belcms_caleendar_img">
                <img class="glightbox" src="<?= $file; ?>" alt="event_<?= $value->id; ?>">
            </div>
            <div class="belcms_calendar_infos">
                <h2><?= $value->name; ?></h2>
                <div><i class="fa-solid fa-calendar-days"></i> : <?= $dateFinal; ?></div>
                <div><i class="fa-solid fa-clock"></i> <?= $value->start_time; ?> - <?= $value->end_time; ?></div>
                <div><i class="fa-solid fa-location-dot"></i> <?= $value->location; ?></div>
                <div><?= $value->description; ?></div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>