<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.2.0 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/


namespace BelCMS\Core\Security;

if (!defined('CHECK_INDEX')) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit();
}


/**
 * Gestion de l'encodage Base32 RFC 4648
 *
 * Utilisé par TOTP / Google Authenticator
 */
class Base32
{

    /**
     * Alphabet RFC 4648
     */
    private const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';


    /**
     * Génère un secret Base32 aléatoire
     *
     * @param int $length
     * @return string
     */
    public static function generateSecret(int $length = 32): string
    {

        $secret = '';

        $max = strlen(self::ALPHABET) - 1;


        for ($i = 0; $i < $length; $i++) {

            $secret .= self::ALPHABET[
                random_int(0, $max)
            ];

        }


        return $secret;

    }


    /**
     * Encode une donnée en Base32
     *
     * @param string $data
     * @return string
     */
    public static function encode(string $data): string
    {

        $binary = '';

        foreach (str_split($data) as $char) {

            $binary .= str_pad(
                decbin(ord($char)),
                8,
                '0',
                STR_PAD_LEFT
            );

        }


        $base32 = '';

        foreach (str_split($binary, 5) as $chunk) {

            if (strlen($chunk) < 5) {

                $chunk = str_pad(
                    $chunk,
                    5,
                    '0'
                );

            }


            $base32 .= self::ALPHABET[
                bindec($chunk)
            ];

        }


        return $base32;

    }




    /**
     * Décode une chaîne Base32
     *
     * @param string $base32
     * @return string
     */
    public static function decode(string $base32): string
    {

        $base32 = strtoupper(
            rtrim($base32, '=')
        );


        $binary = '';


        foreach (str_split($base32) as $char) {


            $value = strpos(
                self::ALPHABET,
                $char
            );


            if ($value === false) {
                continue;
            }


            $binary .= str_pad(
                decbin($value),
                5,
                '0',
                STR_PAD_LEFT
            );

        }


        $data = '';


        foreach (str_split($binary, 8) as $byte) {


            if (strlen($byte) === 8) {

                $data .= chr(
                    bindec($byte)
                );

            }

        }


        return $data;

    }


}