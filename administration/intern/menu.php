<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Menu
{
    private function getLayout($array)
    {
        foreach ($array as $key => $value):
        ?>
            <li>
                <a href="<?= $value[0]; ?>"><?= $key; ?></a>
            </li>
        <?php
        endforeach;
    }

    public function settings()
    {
        $array = array(
            'Préférences Générales'   => array('prefgen?admin&option=parameter', ''),
            'Configuration e-mail'    => array('mail?admin&option=parameter', ''),
            'Maintenance'             => array('unavailable?admin&option=parameter', ''),
            'Configuration des pages' => array('config?admin&option=parameter', '')
        );
        ksort($array);
        self::getLayout($array);
    }

    public function template()
    {
        $array = array(
            //'Styles'              => array('styles?admin&option=templates', ''),
            'Gestions des Thèmes' => array('themes?admin&option=templates', '')
        );
        ksort($array);
        self::getLayout($array);
    }

    public function user()
    {
        $array = array(
            'Bannissement'   => array('banishment?admin&option=users', ''),
            'Groupes'        => array('groups?admin&option=users', ''),
            'Membres'        => array('registration?admin&option=users', '')
        );
        ksort($array);
        self::getLayout($array);
    }

    public function pages()
    {
        $array = array(
            'Articles'            => array('articles?admin&amp;option=pages', ''),
            'Calendrier'          => array('calendar?admin&amp;option=pages', ''),
            'Commentaires'        => array('comments?admin&amp;option=pages', ''),
            'Contact'             => array('contact?admin&amp;option=pages', ''),
            //'Donation'            => array('donations?admin&amp;option=pages', ''),
            'Téléchargements'     => array('downloads?admin&amp;option=pages', ''),
            //'Foire aux questions' => array('faq?admin&amp;option=pages', ''),
            'Forum'               =>array('forum?admin&amp;option=pages', ''),
            'Galerie d\'images'   =>array('gallery?admin&amp;option=pages', ''),
            'Livre d\'or'         =>array('guestbook?admin&amp;option=pages', ''),
            'Liens'               =>array('links?admin&amp;option=pages', ''),
            //'Boutique'            => array('market?admin&amp;option=pages', ''),
            'Actualités'          => array('news?admin&amp;option=pages', ''),
            'Newsletter'          => array('newsletter?admin&amp;option=pages', ''),
            'Hébérgements'        => array('buyplan?admin&amp;option=pages', ''),
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
            //'Newsletter'     =>  array('newsletter?management&option=widgets', ''),
            'T\'chat'        =>  array('shoutbox?management&option=widgets', ''),
            'Statistiques'   =>  array('statistics?management&option=widgets', ''),
            //'Sondages'       =>  array('survey?management&option=widgets', '')
        );
        ksort($array);
        self::getLayout($array);
    }

    public function extras()
    {
        $array = array(
            'Serveur'          =>  array('server?management&option=extras', ''),
            'Mails interdits'  =>  array('forbidden?management&option=extras', ''),
            //'ASEH'            =>  array('aseh?management&option=extras', ''), 
        );
        ksort($array);
        self::getLayout($array);
    }

    public function games()
    {
        $array = array(
            'Teams'   =>  array('teams?management&option=gaming', ''),
        );
        ksort($array);
        self::getLayout($array);
    }
}
