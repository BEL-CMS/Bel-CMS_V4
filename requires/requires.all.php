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
################################################
# Principaux fichiers à inclure
################################################
$files = array(
);
foreach ($files as $include) {
    try {
        require_once $include;
    } catch (Exception $e) {
        debug($e->getMessage());
    }
}
?>