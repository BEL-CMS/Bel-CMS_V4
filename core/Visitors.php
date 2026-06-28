<?php

namespace BelCMS\Core;

class Visitors
{
    /**
     * Robots à ignorer
     */
    private static array $bots = [
        'googlebot',
        'bingbot',
        'duckduckbot',
        'slurp',
        'baiduspider',
        'yandexbot',
        'sogou',
        'exabot',
        'facebot',
        'facebookexternalhit',
        'ia_archiver',
        'crawler',
        'spider',
        'bot',
        'curl',
        'wget'
    ];

    /**
     * Point d'entrée principal CMS
     * À appeler dans Dispatcher ou PageContent
     */
    public static function register(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // évite double comptage session
        if (isset($_SESSION['VISITOR_COUNTED'])) {
            return;
        }

        // ignore robots
        if (self::isBot()) {
            return;
        }

        // optionnel : ignorer admin (selon ton User system)
        if (class_exists('User') && User::isLogged()) {
            if (method_exists('User', 'isAdmin') && User::isAdmin()) {
                return;
            }
        }

        $db = self::db();

        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $date = date('Y-m-d');

        // éviter double comptage IP/jour
        $check = $db->prepare("
            SELECT id
            FROM visitors
            WHERE ip = ?
            AND visit_date = ?
            LIMIT 1
        ");

        $check->execute([$ip, $date]);

        if (!$check->fetch()) {

            $insert = $db->prepare("
                INSERT INTO visitors
                (ip, user_agent, visit_date, created_at)
                VALUES
                (?, ?, ?, NOW())
            ");

            $insert->execute([$ip, $ua, $date]);
        }

        $_SESSION['VISITOR_COUNTED'] = true;
    }

    /**
     * Détection bots
     */
    private static function isBot(): bool
    {
        $ua = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

        if ($ua === '') {
            return true;
        }

        foreach (self::$bots as $bot) {
            if (str_contains($ua, $bot)) {
                return true;
            }
        }

        return false;
    }

    /**
     * DB compatible Bel-CMS
     */
    private static function db()
    {
        /**
         * CAS 1 : ton CMS utilise global PDO
         */
        if (isset($GLOBALS['DB'])) {
            return $GLOBALS['DB'];
        }

        /**
         * CAS 2 : classe Database existante
         */
        if (class_exists('Database')) {
            return Database::getInstance();
        }

        /**
         * CAS 3 : fallback Dispatcher si tu stockes DB dedans
         */
        if (class_exists('Dispatcher') && method_exists('Dispatcher', 'db')) {
            return Dispatcher::db();
        }

        throw new \Exception("DB introuvable dans Bel-CMS");
    }

    /**
     * Visiteurs aujourd'hui
     */
    public static function today(): int
    {
        $db = self::db();

        $q = $db->prepare("
            SELECT COUNT(DISTINCT ip)
            FROM visitors
            WHERE visit_date = ?
        ");

        $q->execute([date('Y-m-d')]);

        return (int) $q->fetchColumn();
    }

    /**
     * Total visiteurs uniques
     */
    public static function total(): int
    {
        $db = self::db();

        return (int) $db->query("
            SELECT COUNT(DISTINCT ip)
            FROM visitors
        ")->fetchColumn();
    }

    /**
     * Visiteurs en ligne (5 min)
     */
    public static function online(): int
    {
        $db = self::db();

        $q = $db->prepare("
            SELECT COUNT(DISTINCT ip)
            FROM visitors
            WHERE created_at >= NOW() - INTERVAL 5 MINUTE
        ");

        $q->execute();

        return (int) $q->fetchColumn();
    }

    /**
     * Hook CMS simple (optionnel dashboard)
     */
    public static function stats(): array
    {
        return [
            'today'  => self::today(),
            'total'  => self::total(),
            'online' => self::online()
        ];
    }
}