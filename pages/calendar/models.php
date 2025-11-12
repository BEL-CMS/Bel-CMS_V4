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

namespace Belcms\Pages\Models;
use BelCMS\Core\Config;
use BelCMS\Core\Dispatcher;
use BelCMS\PDO\BDD;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

final class Calendar
{
	#####################################
	# Infos tables
	#####################################
	public function get()
	{
		$sql = New BDD();
		$sql->table('TABLE_EVENTS');
		$sql->isObject(false);
		$sql->queryAll();
		$events = array();
		foreach ($sql->data as $db_event) {
			$event = new \stdClass();
			$event->title = $db_event['name'];
			$event->image = empty($db_event['image']) ? '/assets/images/no_screen.png' : $db_event['image'];
			$event->day   = date('j', strtotime($db_event['start_date']));
			$event->month = date('n', strtotime($db_event['start_date']));
			$event->year  = date('Y', strtotime($db_event['start_date']));
			if (!$db_event['end_date'] || ($db_event['end_date'] == '0000-00-00')) {
				$event->duration = 1;
			} else {
				if (date('Ymd', strtotime($db_event['start_date'])) == date('Ymd', strtotime($db_event['end_date']))) {
					$event->duration = 1;
				} else {
					$start_day = date('Y-m-d', strtotime($db_event['start_date']));
					$end_day   = date('Y-m-d', strtotime($db_event['end_date']));
					$event->duration = ceil(abs(strtotime($end_day) - strtotime($start_day)) / 86400) + 1;
				}
			}
			$event->time = $db_event['end_time'] ? $db_event['start_time'] . ' - ' . $db_event['end_time'] : $db_event['start_time'];
			$event->color = $db_event['color'];
			$event->location = $db_event['location'];
			$event->description = nl2br($db_event['description']);
			
			array_push($events, $event);
		}

		return $events;
	}

	public function getList ()
	{
		$config = Config::GetConfigPage('calendar');
		if (isset($config->config['MAX_LIST'])) {
			$nbpp = (int) $config->config['MAX_LIST'];
		} else {
			$nbpp = (int) 6;
		}
		$page = (Dispatcher::RequestPages() * $nbpp) - $nbpp;
		$sql = New BDD();
		$sql->table('TABLE_EVENTS');
		$sql->orderby('ORDER BY `'.constant('TABLE_EVENTS').'`.`id` DESC', true);
		$sql->limit(array(0 => $page, 1 => $nbpp), true);
		$sql->queryAll();
		return $sql->data;
	}

	public function getMonthDayYear ($day, $month, $year)
	{
		$countCaracter      = strlen($day)   == 1 ? '0'.$day : $day;
		$countCaracterMonth = strlen($month) == 1 ? '0'.$month : $month;
		$day   =  $countCaracter;
		$month = $countCaracterMonth;
		$valueStart = $year.'-'.$month.'-'.$day;
		$where = "WHERE `start_date` = '{$valueStart}' OR `end_date` = '{$valueStart}'";
		$sql = new BDD;
		$sql->table('TABLE_EVENTS');
		$sql->orderby('ORDER BY `'.constant('TABLE_EVENTS').'`.`id` DESC', true);
		$sql->where($where);
		$sql->queryAll();
		$return = $sql->data;
		return $return;
	}
}