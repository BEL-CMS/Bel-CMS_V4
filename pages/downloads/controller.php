<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;

use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\Secure;
use BelCMS\Core\Security;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Downloads extends Pages
{
    var $useModels = 'Downloads';

    function index ()
    {
        $i    = 0;
        $data = $this->models->getCat ();
        // Tableau, liste les catégories et supprime ceux que l'utilisateur n'a pas accès.
        foreach ($data as $a => $b) {
            $i++;
            $group = empty($b->id_groups) ? 0 : $b->id_groups;
            if (!empty($group) &&  Security::isAcess($b->id_groups) == false) {
                unset($data[$a]);
            } else {
                $get['data'][$i] = (object) array();
                $get['data'][$i]->id     = $b->id;
                $get['data'][$i]->name   = $b->name;
                $get['data'][$i]->banner = $b->banner;
                $get['data'][$i]->description = $b->description;
                $get['data'][$i]->view   = $b->view;
                $get['data'][$i]->dls    = $b->dls;
            }
        }
        $this->set($get);
        $this->render('index');
    }

    public function detail ()
    {
        $i = 0;
        if (is_numeric($this->data[2])) {
            $data = $this->models->detail ($this->data[2]);
            $get = array();
            foreach ($data as $key => $value) {
                $i++;
                $get['data'][$i] = (object) array();
                $get['data'][$i]->id       = (int) $value->id;
                $get['data'][$i]->name     = Common::VarSecure($value->name, null);
                $get['data'][$i]->size     = Common::ConvertSize($value->size);
                $get['data'][$i]->date     = Common::TransformDate($value->date_upload, 'MEDIUM', 'MEDIUM');
                $get['data'][$i]->nameCat  = $this->models->getNameCat($value->idcat);
                $get['data'][$i]->typeMime = is_file($value->download) ? Common::mime_content_type($value->download) : substr($value->ext, -4);
                $get['data'][$i]->md5      = is_file($value->download) ? md5_file($value->download) : '';
            }
            $this->set($get);
            $this->render ('detail');
        } else {
            $this->interaction('error', 'ID Fausse', 'Downloads');
            $this->message('warning', 'ID Fausse', 'ALERT ID', false);
            $this->redirect('Downloads', 3);
        }
    }

    public function view ()
    {
        if (is_numeric($this->data[2])) {
            $data = $this->models->view ($this->data[2]);
            $get = array();
            $get['data'] = (object) array();
            $get['data']->id       = (int) $data->id;
            $get['data']->name     = Common::VarSecure($data->name, null);
            $get['data']->size     = Common::ConvertSize($data->size);
            $get['data']->date     = Common::TransformDate($data->date_upload, 'FULL', 'MEDIUM');
            $get['data']->nameCat  = $this->models->getNameCat($data->idcat);
            $get['data']->typeMime = is_file($data->download) ? Common::mime_content_type($data->download) : substr($data->ext, -4);
            $get['data']->md5      = is_file($data->download) ? md5_file($data->download) : 'Inconnu';
            $get['data']->desc     = Common::VarSecure($data->description, 'html');
            $get['data']->uploader = User::ifUserExist($data->uploader) ? User::getInfosUserAll($data->uploader)->user->username : 'Inconnu';
            $get['data']->view     = (int) $data->view;
            $get['data']->dls      = (int) $data->dls;
            $get['data']->screen   = !empty($data->screen) ? $data->screen : '/assets/img/no_dl.jpg';
            $this->set($get);
            $this->render ('view');
            $this->models->NewView ($this->data[2]);
        } else {
            $this->interaction('error', 'ID Fausse', 'Downloads');
            $this->message('warning', 'ID Fausse', 'ALERT ID', false);
            $this->redirect('Downloads', 3);
        }
    }

    public function getDownload ()
    {
        $id = $this->data[2];
        if (is_numeric($id)) {
            $get = $this->models->getDownloads($id);
            $this->linkHeader($get);
        } else {
            $this->interaction('error', 'ID Fausse', 'Downloads');
            $this->message('warning', 'ID Fausse', 'ALERT ID', true);
            $this->redirect('Downloads', 3);
        }
    }
}