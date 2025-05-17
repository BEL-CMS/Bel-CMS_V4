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
?>
            <?php
            foreach ($array as $key => $value):
            ?>
                <li class="slide">
                    <a href="<?= $value; ?>" class="side-menu__item"><?= $key; ?></a>
                </li>
            <?php
            endforeach;
            ?>
<?php
    }

    public function settings()
    {
        $array = array(
            'Préférences Générales'   => 'prefgen?admin&option=parameter',
            'Contact'                 => 'contact?admin&option=parameter',
            'e-mail'                  => 'mail?admin&option=parameter',
            'Maintenance'             => 'unavailable?admin&option=parameter',
            'Configuration des pages' => 'config?admin&option=parameter'
        );
        ksort($array);
        self::getLayout($array);
    }

    public function template()
    {
        $array = array(
            'Styles'              => 'styles?admin&option=templates',
            'Gestions des Thèmes' => 'themes?admin&option=templates'
        );
        ksort($array);
        self::getLayout($array);
    }

    public function user()
    {
        $array = array(
            'Bannissement'   => 'banishment?admin&option=users',
            'Groupe(s)'      => 'groups?admin&option=users',
            'Enregistrement' => 'registration?admin&option=users'
        );
        ksort($array);
        self::getLayout($array);
    }

    public function pages()
    {
        $array = array(
            'Articles'            => 'articles?admin&amp;option=pages',
            'Calendrier'          => 'calendar?admin&amp;option=pages',
            'Commentaires'        => 'comments?admin&amp;option=pages',
            'Donation'            => 'donations?admin&amp;option=pages',
            'Téléchargements'     => 'downloads?admin&amp;option=pages',
            'Foire aux questions' => 'faq?admin&amp;option=pages',
            'Forum'               => 'forum?admin&amp;option=pages',
            'Galerie d\'images'   => 'gallery?admin&amp;option=pages',
            'Livre d\'or'         => 'guestbook?admin&amp;option=pages',
            'Liens'               => 'links?admin&amp;option=pages',
            'Boutique'            => 'market?admin&amp;option=pages',
            'Actualités'          => 'news?admin&amp;option=pages',
            'Newsletter'          => 'newsletter?admin&amp;option=pages',
            'Tarifs'              => 'pricing?admin&amp;option=pages',
            'Recherche'           => 'search?admin&amp;option=pages',
            'Tickets'             => 'tickets?admin&amp;option=pages'
        );
        ksort($array);
        self::getLayout($array);
    }

    public function  Widgets()
    {
        $array = array(
            'Newsletter'     => 'newsletter?management&option=widgets',
            'T\'chat'        => 'stats?management&option=widgets',
            'Statistiques'   => 'shoutbox?management&option=widgets',
            'Sondages'       => 'survey?management&option=widgets'
        );
        ksort($array);
        self::getLayout($array);
    }

    private function divers()
    {
        $array = array(
            'Upload Fichier'   => 'files?management&option=extras',
            'Backup'           => 'file_manager?management&option=extras',
            'Serveur'          => 'server?management&option=extras'
        );
        ksort($array);
        self::getLayout($array);
    }

    public function fast()
    {
        $array = array(
            'Créer une actualité' => 'news/add?Admin&option=pages',
        );
        ksort($array);
        self::getLayout($array);
    }
}
