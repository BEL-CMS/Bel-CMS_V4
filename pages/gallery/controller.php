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

use BelCMS\Core\Captcha;
use BelCMS\Core\Pages;
use BelCMS\Core\Config;
use BelCMS\Core\Notification;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Gallery extends Pages
{
    var $useModels = 'Gallery';

    function index ()
    {
        $d['cat'] = $this->models->getCategory ();
        $this->set($d);
        $this->render ('index');
    }

    public function subcat ()
    {
        $id = (int) $this->data[2];
        $d['img'] = $this->models->getImg ($id);
        foreach ($d['img'] as $key => $value) {
            $d['img'][$key]->vote = $this->models->getVote ($value->id);
        }
        $config = Config::GetConfigPage('gallery');
        $d['pagination'] = $this->pagination($config->config['MAX_PAGE'], 'gallery/subcat', constant('TABLE_GALLERY'));
        if ($d['img'] == null) {
            Notification::error('Pas d\'images disponibles dans cette catégorie.', 'Images');
        } else {
            $this->set($d);
            $this->render ('img');
        }
    }

    public function new ()
    {
        $d['img'] = $this->models->getImgNew ();
        foreach ($d['img'] as $key => $value) {
            $d['img'][$key]->vote = $this->models->getVote($value->id);
        }
        if ($d['img'] == null) {
            Notification::error('Pas d\'images disponibles.', 'Images');
        } else {
            $this->set($d);
            $this->render('new');
        }
    }

    public function propose()
    {
        $captcha = new Captcha ();
        $d['captcha'] = $captcha->createCaptcha();
        $this->set($d);
        $this->render ('propose');
    }

    public function SendNew ()
    {
        if (Captcha::verifCaptcha($_POST['captcha']) == true and empty($_POST['captcha_value'])) {
            if (empty($_POST['name'])) {
                Notification::error('Aucun nom transmis.', 'titre');
            } else {
                $post['name'] = Common::VarSecure($_POST['name']);
                $post['description'] = Common::VarSecure($_POST['description'], 'html');
            }
            if (isset($_FILES['image'])) {
                $image = Common::Upload('image', 'uploads/gallery/tmp/', array('.png', '.gif', '.jpg', '.jpeg', '.ico', '.tif', '.eps', '.svg', '.webp'), true);
                if ($image) {
                    $post['image'] = $image;
                    $this->models->insertTmp($post);
                }
            } else {
                Notification::error('Aucune image n\'a été envoyée.', 'Image');
                return;
            }
        } else {
            Notification::error('Le captcha intégral ne s\'aligne pas avec nos attentes.', 'Captcha');
            return;
        }
        Notification::success('La validation de l\'image que vous avez publiée est en cours.', 'Image');
        $this->redirect('Gallery/propose', 2);
    }

    public function addvote()
    {
        if (User::isLogged()) {
            $array['num']    = (int) $this->data[2];
            $array['name']   = 'gallery';
            $array['author'] = User::ifUserExist($_SESSION['USER']->user->hash_key) ? $_SESSION['USER']->user->hash_key : 0;
            $return = $this->models->addVote($array);
            $this->message($return['type'], $return['msg'], constant('INFO'));
        } else {
            $this->message('ALERT', 'Pour participer au vote, vous devez être authentifié.', constant('INFO'));
        }
        $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'gallery';
        $this->redirect($referer, 3);
    }}