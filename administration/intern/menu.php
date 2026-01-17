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

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

final class Menu
{
    private function getLayout($array)
    {
        foreach ($array as $key => $value):
        ?>
            <li class="slide">
                <a class="side-menu__item " href="<?= $value[0]; ?>">
                    <i class="<?= $value[1]; ?> scale-1x"></i>
                    <span><?= $key; ?></span>
                </a>
            </li>
        <?php
        endforeach;
    }

    public function settings()
    {
        $array = array(
            '. Préférences Générales'   => array('prefgen?admin&option=parameter', ''),
            '. Contact'                 => array('contact?admin&option=parameter', ''),
            '. Configuration e-mail'    => array('mail?admin&option=parameter', ''),
            '. Maintenance'             => array('unavailable?admin&option=parameter', ''),
            '. Configuration des pages' => array('config?admin&option=parameter', '')
        );
        ksort($array);
        self::getLayout($array);
    }

    public function template()
    {
        $array = array(
            '. Styles'              => array('styles?admin&option=templates', ''),
            '. Gestions des Thèmes' => array('themes?admin&option=templates', '')
        );
        ksort($array);
        self::getLayout($array);
    }

    public function user()
    {
        $array = array(
            '. Bannissement'   => array('banishment?admin&option=users', ''),
            '. Groupe(s)'      => array('groups?admin&option=users', ''),
            '. Enregistrement' => array('registration?admin&option=users', '')
        );
        ksort($array);
        self::getLayout($array);
    }

    public function pages()
    {
        $array = array(
            '. Articles'            => array('articles?admin&amp;option=pages', ''),
            '. Calendrier'          => array('calendar?admin&amp;option=pages', ''),
            '. Commentaires'        => array('comments?admin&amp;option=pages', ''),
            //'Donation'            => array('donations?admin&amp;option=pages', ''),
            '. Téléchargements'     => array('downloads?admin&amp;option=pages', ''),
            //'Foire aux questions' => array('faq?admin&amp;option=pages', ''),
            '. Forum'               =>array('forum?admin&amp;option=pages', ''),
            '. Galerie d\'images'   =>array('gallery?admin&amp;option=pages', ''),
            '. Livre d\'or'         =>array('guestbook?admin&amp;option=pages', ''),
            '. Liens'               =>array('links?admin&amp;option=pages', ''),
            //'Boutique'            => array('market?admin&amp;option=pages', ''),
            '. Actualités'          => array('news?admin&amp;option=pages', ''),
            '. Newsletter'          => array('newsletter?admin&amp;option=pages', ''),
            //'Tarifs'              => array('pricing?admin&amp;option=pages', ''),
            //'Recherche'           => array('search?admin&amp;option=pages', ''),
            //'Tickets'             => array('tickets?admin&amp;option=pages, ''),
        );
        ksort($array);
        self::getLayout($array);
    }

    public function  Widgets()
    {
        $array = array(
            '. Newsletter'     =>  array('newsletter?management&option=widgets', ''),
            '. T\'chat'        =>  array('stats?management&option=widgets', ''),
            '. Statistiques'   =>  array('shoutbox?management&option=widgets', ''),
            '. Sondages'       =>  array('survey?management&option=widgets', '')
        );
        ksort($array);
        self::getLayout($array);
    }

    public function extras()
    {
        $array = array(
            '. Upload Fichier'   =>  array('files?management&option=extras', ''),
            '. Backup'           =>  array('file_manager?management&option=extras', ''),
            '. Serveur'          =>  array('server?management&option=extras', ''),
            '. Mot interdit'     =>  array('forbidden?management&option=extras', '')
        );
        ksort($array);
        self::getLayout($array);
    }
}
