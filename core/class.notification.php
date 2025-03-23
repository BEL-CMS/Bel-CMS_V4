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

namespace BelCMS\Core;

################################################
# Class Template
################################################
#########################################
# Notification Alert (red, blue, green, orange, grey)
# alert error infos success warning
#########################################
final class Notification
{
	public static function alert ($text = null, $title = null, $full = false)
	{
		$text  = $text  != null ? $text  : defined('NO_TEXT_DEFINED');
		if ($full === true) {
			echo self::renderFull('error', $text, $title);
			die();
		} else {
			echo self::render ('error', $text, $title);
		}
	}
	public static function error ($text = null, $title = null, $full = false)
	{
		$text  = $text  != null ? $text  : defined('NO_TEXT_DEFINED');
		if ($full === true) {
			echo self::renderFull('error', $text, $title);
			die();
		} else {
			echo self::render ('error', $text, $title);
		}
	}
	public static function warning ($text = null, $title = null, $full = false)
	{
		$text  = $text  != null ? $text  : defined('NO_TEXT_DEFINED');
		if ($full === true) {
			echo self::renderFull('warning', $text, $title);
			die();
		} else {
			echo self::render ('warning', $text, $title);
		}
	}
	public static function success ($text = null, $title = null, $full = false)
	{
		$text  = $text  != null ? $text  : defined('NO_TEXT_DEFINED');
		if ($full === true) {
			echo self::renderFull('success', $text, $title);
			die();
		} else {
			echo self::render ('success', $text, $title);
		}
	}
	public static function infos ($text = null, $title = null, $full = false)
	{
		$text  = $text  != null ? $text  : defined('NO_TEXT_DEFINED');
		if ($full === true) {
			echo self::renderFull('infos', $text, $title);
			die();
		} else {
			echo self::render ('infos', $text, $title);
		}
	}
	private static function render ($type = null, $text = 'BEL-CMS : Alert neutral', $title = null)
	{
		switch ($type) {
			case 'alert':
				$bg = 'background-color: rgba(223, 83, 73, .8) !important;';
			break;

			case 'error':
				$bg = 'background-color: rgba(223, 83, 73, .8) !important;';
			break;

			case 'success':
				$bg = 'background-color: rgba(106, 189, 110, .8) !important;';
			break;

			case 'warning':
				$bg = 'background-color: rgba(255, 170, 43, .8) !important;';
			break;

			case 'infos':
				$bg = 'background-color: rgba(42, 167, 246, .8) !important;';
			break;

			default:
				$bg = 'background-color: rgba(102, 97, 90, 1) !important;';
			break;
		}
		$render  = '<section style="border: 1px solid rgba(209, 207, 207, 1);background:rgba(248, 248, 248, 1);margin: 15px auto;width:99%;overflow:hidden;padding:0 !important;">'.PHP_EOL;
		if (!empty($title)):
		$render .= '<header style="left:0;position: relative !important;:display: block;width:100%;padding:15px;overflow:hidden;color:rgba(255, 255, 255, 0.95);min-height:auto !important;'.$bg.'">'.PHP_EOL;
		$render .= '<span style="display:block;float:left;margin-left:15px;line-height:24px;font-size:16px;font-weight: bold;">'.$title.'</span>'.PHP_EOL;
		endif;
		$render .= '</header>'.PHP_EOL;
		$render .= '<div style="margin:15px;padding: 15px;text-align: justify;border: 1px solid rgba(209, 207, 207, 1);background-color:rgba(244, 242, 242, 1);font-weight:13px;color:gray;width:calc(100% - 30px);">'.PHP_EOL;
		$render .= $text;
		$render .= '</div>'.PHP_EOL;
		$render .= '</section>'.PHP_EOL;
		return $render;
	}
	################################################
	# Notification Full page| error - warning - success
	################################################
	public static function renderFull ($type = null, $text = 'BEL-CMS : Alert neutral', $title = 'Alert !')
	{
		$render  = '<!DOCTYPE html>';
		$render .= '<html lang="fr">';
		$render .= '<head>';
		$render .= '<meta charset="utf-8">';
		$render .= '<title>Error : '.$title.'</title>';
		$render .= '<link rel="stylesheet" href="/assets/css/belcms.notification.css">';
		$render .= '</head>';
		$render .= '<body>';
		$render .= '<section id="error">';
		$render .= '<section class="belcms_notification">';
		$render .= '<header class="belcms_notification_header '.$type.'">';
		$render .= '<span>'.$title.'</span>';
		$render .= '</header>';
		$render .= '<div class="belcms_notification_msg">';
		$render .= $text;
		$render .= '</div> ';
		$render .= '</section>';
		$render .= '</section>';
		$render .= '</body>';
		$render .= '</html>';
		return $render;
	}
}