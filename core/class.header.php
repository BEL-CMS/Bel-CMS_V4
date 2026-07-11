<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace BelCMS\Core;

use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
}

final class headerPages
{
    var $title,
        $button,
        $msg,
        $submsg,
        $ico;

    public function __construct(string $title, array $button, string $msg, string $submsg, $ico = null)
    {
        $this->title = Common::VarSecure($title);
        $this->button = is_array($button) ? $button : array();
        $this->msg = Common::VarSecure($msg, true);
        $this->submsg = Common::VarSecure($submsg, true);
        $this->ico = is_null($ico) ? 'fa-solid fa-angles-right' : Common::VarSecure($ico);
        echo self::render();
    }

    public function render ()
    {
        ob_start();

        ?>

        <section id="belcms_header_top">
            <div id="belcms_header_top_title">
                <h1><i class="<?= $this->ico; ?>"></i> <?= $this->title; ?></h1>
                <?php
                foreach ($this->button as $key => $value):
                   echo '<a href="'.$value['href'].'" title="'.$value['title'].'">'.$value['name'].'</a>';
                endforeach;
                ?>
            </div>
            <div id="belcms_header_top_content">
                <div id="belcms_header_top_content_msg"><?= $this->msg; ?></div>
                <span><?= $this->submsg; ?></span>
            </div>
        </section>

        <?php

        $content = ob_get_contents();

 		if (ob_get_length() != 0) {
			ob_end_clean();
		}

		return $content;
    }
}