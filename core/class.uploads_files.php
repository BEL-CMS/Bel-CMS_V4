<?php
/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace BelCMS\Core;

use ZipArchive;

class DownloadsUpload
{
    private const MAX_SIZE = 500 * 1024 * 1024; // 500 MB

    private static array $allowedMime = [

        // ZIP
        'zip' => [
            'application/zip',
            'application/x-zip-compressed',
            'multipart/x-zip'
        ],

        // EXE
        'exe' => [
            'application/x-msdownload',
            'application/octet-stream'
        ],

        // RAR
        'rar' => [
            'application/vnd.rar',
            'application/x-rar-compressed'
        ]
    ];

    private static array $forbiddenFiles = [
        'php',
        'phtml',
        'phar',
        'php3',
        'php4',
        'php5',
        'js',
        'sh',
        'bat',
        'cmd'
    ];

    /**
     * Upload fichier download sécurisé
     */
    public static function upload(
        string $input,
        string $destination
    ): array {

        if (
            !isset($_FILES[$input]) ||
            $_FILES[$input]['error'] !== UPLOAD_ERR_OK
        ) {
            return [
                'success' => false,
                'message' => 'Erreur upload'
            ];
        }

        if (!is_uploaded_file($_FILES[$input]['tmp_name'])) {
            return [
                'success' => false,
                'message' => 'Upload invalide'
            ];
        }

        if ($_FILES[$input]['size'] > self::MAX_SIZE) {
            return [
                'success' => false,
                'message' => 'Fichier trop volumineux'
            ];
        }

        $originalName = $_FILES[$input]['name'];

        /**
         * Double extension protection
         */
        if (
            preg_match(
                '/\.(php|phtml|phar|php3|php4|php5)/i',
                $originalName
            )
        ) {
            return [
                'success' => false,
                'message' => 'Extension interdite'
            ];
        }

        /**
         * Extension réelle
         */
        $extension = strtolower(
            pathinfo(
                $originalName,
                PATHINFO_EXTENSION
            )
        );

        if (!isset(self::$allowedMime[$extension])) {
            return [
                'success' => false,
                'message' => 'Type interdit'
            ];
        }

        /**
         * MIME réel
         */
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $mime = finfo_file(
            $finfo,
            $_FILES[$input]['tmp_name']
        );

        finfo_close($finfo);

        if (
            !in_array(
                $mime,
                self::$allowedMime[$extension]
            )
        ) {
            return [
                'success' => false,
                'message' => 'MIME invalide'
            ];
        }

        /**
         * Vérification ZIP
         */
        if ($extension === 'zip') {

            $zipCheck = self::checkZip(
                $_FILES[$input]['tmp_name']
            );

            if ($zipCheck !== true) {
                return [
                    'success' => false,
                    'message' => $zipCheck
                ];
            }
        }

        /**
         * Création dossier
         */
        if (!file_exists($destination)) {

            mkdir(
                $destination,
                0755,
                true
            );
        }

        /**
         * Nom aléatoire
         */
        $filename = bin2hex(
            random_bytes(32)
        );

        $finalName = $filename.'.'.$extension;

        $path = rtrim(
            $destination,
            '/'
        ).'/'.$finalName;

        /**
         * Upload
         */
        if (
            !move_uploaded_file(
                $_FILES[$input]['tmp_name'],
                $path
            )
        ) {
            return [
                'success' => false,
                'message' => 'Erreur sauvegarde'
            ];
        }

        /**
         * Permissions
         */
        chmod($path, 0644);

        return [
            'success' => true,
            'file'    => $finalName,
            'name'    => $originalName,
            'mime'    => $mime,
            'size'    => $_FILES[$input]['size']
        ];
    }

    /**
     * Vérification contenu ZIP
     */
    private static function checkZip(
        string $file
    ): bool|string {

        $zip = new ZipArchive();

        if ($zip->open($file) !== true) {
            return 'ZIP corrompu';
        }

        for ($i = 0; $i < $zip->numFiles; $i++) {

            $name = $zip->getNameIndex($i);

            $ext = strtolower(
                pathinfo(
                    $name,
                    PATHINFO_EXTENSION
                )
            );

            if (
                in_array(
                    $ext,
                    self::$forbiddenFiles
                )
            ) {

                $zip->close();

                return 'ZIP contient un fichier interdit';
            }
        }

        $zip->close();

        return true;
    }
}