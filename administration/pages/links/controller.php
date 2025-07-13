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

namespace Belcms\Pages\Controller;

use BelCMS\Core\Pages;
use BelCMS\Core\Captcha;
use BelCMS\Core\Config;
use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Links extends Pages
{
    var $useModels = 'Links';

    public function index()
    {
        $a['cat']    = $this->models->getCat();
        $a['nbcat']  = $this->models->getNbCat();
        $a['nblink'] = $this->models->getNbLink();
        $this->set($a);
        $this->render('index');
    }

    public function cat()
    {
        $id = (int) $this->data[2];
        $a['cat'] = $this->models->getCatForNumber($id);
        $a['links'] = $this->models->getLinksForNumberCat($a['cat']->id);
        $this->set($a);
        $this->render('cat');
    }

    public function link()
    {
        $id = (int) $this->data[2];
        $this->models->addCount ($id);
        $a['links'] = $this->models->getLinksForNumber($id);
        $this->set($a);
        $this->render('link');
    }

    public function click()
    {
        $id = (int) $this->data[2];
        $link = $this->models->onePlus($id);
        $a['link'] = $link;
        $this->set($a);
        $this->render('click');
    }

    public function propose()
    {
        if (User::isLogged()) {
            $captcha = new Captcha();
            $d['captcha'] = $captcha->createCaptcha();
            $this->render('propose');
        } else {
            Notification::error('Il est nécessaire d\'être connecté pour pouvoir soumettre un lien.', 'Lien');
            return;
        }
    }

    public function SendNew ()
    {
        if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
            if (empty($_POST['name']) or empty($_POST['link'])) {
                Notification::error('Aucun nom ou lien transmis.', 'Lien');
            } else {
                $post['name'] = Common::VarSecure($_POST['name']);
                $post['link'] = Secure::isUrl($_POST['link']);
                $post['description'] = Common::VarSecure($_POST['description'], 'html');
                $post['description'] = $post['description'];
            }
            if (isset($_FILES['image'])) {
                $image = Common::Upload('image', 'uploads/links/tmp/', array('.png', '.gif', '.jpg', '.jpeg', '.ico', '.tif', '.eps', '.svg', '.webp'), true);
                if ($image) {
                    $post['image'] = $image;
                    $this->models->insertTmp($post);
                } else {
                    $post['image'] = null;
                }
            }
        } else {
            Notification::error('Le captcha intégral ne s\'aligne pas avec nos attentes.', 'Captcha');
            return;
        }
        Notification::success('La validation du lien que vous avez publiée est en cours.', 'Lien');
        $this->redirect('Links', 2);
    }

    public function new ()
    {
        $config = Config::GetConfigPage('links');
        $a['pagination'] = $this->pagination($config->config['MAX_PAGE'], 'links/new', constant('TABLE_LINKS'));
        $a['links'] = $this->models->getNew ();
        $this->set($a);
        $this->render ('new');
    }
    public function popular ()
    {
        $config = Config::GetConfigPage('links');
        $a['pagination'] = $this->pagination($config->config['MAX_PAGE'], 'links/popular', constant('TABLE_LINKS'));
        $a['links'] = $this->models->getPopular();
        $this->set($a);
        $this->render('popular');
    }
}
