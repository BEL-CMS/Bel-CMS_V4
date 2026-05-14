<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

namespace BelCMS\Core;

use BelCMS\PDO\BDD;

class Visitors
{
    private static array $bots = [
        'googlebot',
        'bingbot',
        'slurp',
        'duckduckbot',
        'baiduspider',
        'yandex',
        'crawler',
        'spider',
        'bot'
    ];

    /**
     * Enregistrer visiteur
     */
    public static function register(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $sessionId = session_id();
        $ip        = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $page = $_SERVER['REQUEST_URI'] ?? '/';
        $page = parse_url($page, PHP_URL_PATH);

        // Retire le /
        $page = trim($page, '/');

        // Coupe l'URL
        $explode = explode('/', $page);

        // Garde uniquement le premier paramètre
        $page = $explode[0] ?? '';

        // Accueil
        if (empty($page)) {
            $page = 'Accueil';
        }

        // Ignore assets
        if (self::isIgnoredPage($page)) {
  
        }

        $isBot = self::isBot($userAgent) ? 1 : 0;

        $userId   = 0;
        $username = null;

        // Compatible User Bel-CMS
        if (isset($_SESSION['USER'])) {

            $userId = (int) ($_SESSION['USER']->user->hash_key ?? 0);

            $username = $_SESSION['USER']->user->username
                ?? $_SESSION['USER']->user->username
                ?? null;
        }

        $country = self::getCountryCode($ip);

        $time = time();

        // ==========================================
        // DELETE EXPIRE
        // ==========================================

        $sql = new BDD;
        $sql->table('TABLE_VISITORS_ONLINE');
        $sql->where([
            'name'  => 'last_activity',
            'op'    => '<',
            'value' => ($time - 300)
        ]);
        $sql->delete();

        // ==========================================
        // CHECK SESSION
        // ==========================================

        $sql = new BDD;
        $sql->table('TABLE_VISITORS_ONLINE');
        $sql->fields(['id']);
        $sql->where([
            'name'  => 'session_id',
            'value' => $sessionId
        ]);
        $sql->queryOne();

        // ==========================================
        // UPDATE
        // ==========================================

        if (!empty($sql->data->id)) {

            $update = new BDD;
            $update->table('TABLE_VISITORS_ONLINE');

            $update->where([
                'name'  => 'session_id',
                'value' => $sessionId
            ]);

            $update->update([

                'ip'            => $ip,
                'country'       => $country,
                'user_id'       => $userId,
                'username'      => $username,
                'user_agent'    => $userAgent,
                'page'          => $page,
                'is_bot'        => $isBot,
                'last_activity' => $time

            ]);

        } else {

            // ==========================================
            // INSERT
            // ==========================================

            $insert = new BDD;
            $insert->table('TABLE_VISITORS_ONLINE');

            $insert->insert([

                'session_id'   => $sessionId,
                'ip'           => $ip,
                'country'      => $country,
                'user_id'      => $userId,
                'username'     => $username,
                'user_agent'   => $userAgent,
                'page'         => $page,
                'is_bot'       => $isBot,
                'last_activity'=> $time

            ]);
        }

        // ==========================================
        // STATS JOUR / MOIS / ANNEE
        // ==========================================

        $today = date('Y-m-d');

        $stats = new BDD;
        $stats->table('TABLE_VISITORS_STATS');
        $stats->fields(['id']);

        $stats->where([
            [
                'name'  => 'ip',
                'value' => $ip
            ],
            [
                'name'  => 'date_visit',
                'value' => $today
            ]
        ]);

        $stats->queryOne();

        if (empty($stats->data->id)) {

            $insertStats = new BDD;
            $insertStats->table('TABLE_VISITORS_STATS');

            $insertStats->insert([

                'date_visit'  => $today,
                'month_visit' => date('Y-m'),
                'year_visit'  => date('Y'),
                'ip'          => $ip

            ]);
        }
    }

    /**
     * Détection bot
     */
    private static function isBot(string $userAgent): bool
    {
        if (empty($userAgent)) {
            return true;
        }

        $userAgent = strtolower(trim($userAgent));

        $bots = [

            'bot',
            'crawl',
            'slurp',
            'spider',
            'crawler',
            'facebook',
            'meta',
            'whatsapp',
            'telegram',
            'discord',
            'google',
            'bing',
            'yandex',
            'baidu',
            'duckduck',
            'preview',
            'scanner',
            'curl',
            'wget',
            'python',
            'java',
            'axios',
            'libwww',
            'httpclient',
            'scrapy',
            'feedfetcher',
            'monitoring',
            'uptime',
            'check',
            'validator'

        ];

        foreach ($bots as $bot) {

            if (strpos($userAgent, $bot) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Pays IP
     */
    private static function getCountryCode(string $ip): string
    {
        if ($ip == '127.0.0.1' OR $ip == '::1') {
            return 'BE';
        }

        $json = @file_get_contents(
            'http://ip-api.com/json/'.$ip.'?fields=countryCode'
        );

        if ($json !== false) {

            $data = json_decode($json, true);

            if (!empty($data['countryCode'])) {
                return strtoupper($data['countryCode']);
            }
        }

        return 'UN';
    }

    /**
     * Visiteurs online
     */
    public static function getVisitors(): int
    {
        $sql = new BDD;

        $sql->table('TABLE_VISITORS_ONLINE');

        $sql->where([
            [
                'name'  => 'is_bot',
                'value' => 0
            ]
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Bots online
     */
    public static function getBots(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_ONLINE');

        $sql->where([
            'name'  => 'is_bot',
            'value' => 1
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Membres online
     */
    public static function getMembers(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_ONLINE');

        $sql->where([
            'name'  => 'user_id',
            'op'    => '>',
            'value' => 0
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Visiteurs du jour
     */
    public static function getVisitorsToday(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_STATS');

        $sql->where([
            'name'  => 'date_visit',
            'value' => date('Y-m-d')
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Visiteurs du mois
     */
    public static function getVisitorsMonth(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_STATS');

        $sql->where([
            'name'  => 'month_visit',
            'value' => date('Y-m')
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Visiteurs année
     */
    public static function getVisitorsYear(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_STATS');

        $sql->where([
            'name'  => 'year_visit',
            'value' => date('Y')
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Liste online
     */
    public static function getOnlineList(): array
    {
        $sql = new BDD;

        $sql->table('TABLE_VISITORS_ONLINE');

        $sql->orderby([
            [
                'name' => 'user_id',
                'type' => 'DESC'
            ]
        ]);

        $sql->isObject(false);

        $sql->queryAll();

        return $sql->data;
    }

    private static function isIgnoredPage(string $page): bool
    {
        $extensions = [
            'css',
            'js',
            'map',
            'png',
            'jpg',
            'jpeg',
            'gif',
            'svg',
            'webp',
            'ico',
            'woff',
            'woff2',
            'ttf',
            'eot',
            'json',
            'xml',
            'txt'
        ];
        $ext = strtolower(pathinfo($page, PATHINFO_EXTENSION));
        if (in_array($ext, $extensions)) {
            return true;
        }
        return false;
    }
    public static function dataVisitors(): array
    {
        $stats = array(
            'visitors'       => self::getVisitors(),
            'visitorsToday'  => self::getVisitorsToday(),
            'visitorsMonth'  => self::getVisitorsMonth(),
            'visitorsYear'   => self::getVisitorsYear(),
            'visitorsBots'   => self::getBots(),
            'visitorMembers' => self::getMembers(),
            'users'          => self::getOnlineList()
        );
        return $stats;
    }
}