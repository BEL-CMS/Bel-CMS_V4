<?php

namespace BelCMS\Core;

use BelCMS\PDO\BDD;


if (!defined('CHECK_INDEX')) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit();
}


class IP
{

    private static array $cache = [];


    /**
     * Retourne l'IP du visiteur
     */
    public static function client(): string
    {

        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';


        return filter_var(
            $ip,
            FILTER_VALIDATE_IP
        ) ? $ip : '0.0.0.0';

    }



    /**
     * Conversion IPv4 vers entier
     */
    private static function ipToLong(string $ip): int
    {

        return (int)sprintf(
            '%u',
            ip2long($ip)
        );

    }




    /**
     * Retourne les informations GeoIP
     */
    public static function get(?string $ip = null): array
    {


        $ip = $ip ?? self::client();



        if (isset(self::$cache[$ip])) {

            return self::$cache[$ip];

        }



        if (!self::isIPv4($ip)) {

            return [];

        }



        $ipLong = self::ipToLong($ip);



        $bdd = BDD::getInstance();



        $sql = $bdd->prepare(
            "
            SELECT country_code
            FROM belcms_geoip
            WHERE ip_from <= ?
            AND ip_to >= ?
            LIMIT 1
            "
        );


        $sql->execute([
            $ipLong,
            $ipLong
        ]);



        $data = $sql->fetch();



        if (!$data) {

            return [];

        }



        return self::$cache[$ip] = [

            'ip' => $ip,

            'country_code' =>
                $data['country_code']

        ];


    }




    /**
     * Code pays ISO
     */
    public static function countryCode(?string $ip = null): string
    {

        return self::get($ip)['country_code'] ?? 'XX';

    }




    /**
     * Nom du pays
     */
    public static function country(?string $ip = null): string
    {

        $countries = [

            'BE'=>'Belgique',
            'FR'=>'France',
            'LU'=>'Luxembourg',
            'NL'=>'Pays-Bas',
            'DE'=>'Allemagne',
            'GB'=>'Royaume-Uni',
            'US'=>'États-Unis'

        ];


        return $countries[
            self::countryCode($ip)
        ] ?? 'Inconnu';

    }




    /**
     * Vérifie IPv4
     */
    public static function isIPv4(?string $ip = null): bool
    {

        return filter_var(
            $ip ?? self::client(),
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV4
        ) !== false;

    }


}