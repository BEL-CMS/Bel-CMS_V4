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

use BelCMS\Core\config;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Forum extends AdminPages
{
    var $admin  = false;
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsForum';

    public function index ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => constant('MAIN_CAT'), 'href' => 'Forum/maincategory?admin&option=pages', 'ico'  => 'fa-solid fa-square-plus');
        $menu[] = array('title' => constant('ADD_CAT_SUB_SECOND'), 'href' => 'Forum/subcategory?admin&option=pages', 'ico'  => 'fa-solid fa-puzzle-piece');

        $d['cat'] = $this->models->getCat ();
        foreach ($d['cat'] as $key => $value) {
            $id_forum = (int) $value->id_forum;
            $d['cat'][$key]->nameForum = $this->models->getNameForum($id_forum);
        }

        $this->set($d);
        $this->render('index', $menu);
    }

    public function subcategory ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $d['forum'] = $this->models->getForum ();
        $this->set($d);
        $this->render('subcategory', $menu);
    }

    public function maincategory ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');
        $menu[] = array('title' => constant('ADD_MAIN_CAT'), 'href' => 'Forum/addMainCat?admin&option=pages', 'ico'  => 'fa-solid fa-circle-plus');

        $d['main'] = $this->models->getForum();
        $this->set($d);
        $this->render ('mainCat', $menu);
    }

    public function AddCatSec ()
    {
        $d['title']    = Common::VarSecure($_POST['title'], null);
        $d['subtitle'] = Common::VarSecure($_POST['subtitle'], null);
        $d['id_forum'] = (int) $_POST['id_forum'];
        $d['id_supp']  = Common::randomNumeric(9);
        $d['icon']     = Common::VarSecure($_POST['icon'], null);
        if (isset($_POST['access_groups'])) {
            $d['access_groups'] = implode('|', $_POST['access_groups']);
        }
        if (isset($_POST['access_admin'])) {
            $d['access_admin'] = implode('|', $_POST['access_admin']);
        }
        if (isset($_POST['lock_forum'])) {
            $d['lock_forum'] = (int) 1;
        } else {
            $d['lock_forum'] =  (int) 0;
        }

        $d['orderby'] = (int) $_POST['orderby'];

        $return = $this->models->sendNewCattSup ($d);

        if ($return === true) {
            $return = array(
                'type' => 'success',
                'text' => constant('SEND_SUCCESS')
            );
            $this->error('Forum', $return['text'], $return['type']);
        } else {
            $return = array(
                'type' => 'error',
                'text' => constant('SAVE_BDD_ERROR')
            );
            $this->error('Forum', $return['text'], $return['type']);
        }
        $this->redirect('Forum?admin&option=pages', 3);
    }

    public function threads ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');

        $d['threads'] = $this->models->getThreads();

        $this->set($d);

        $this->render('threads', $menu);
    }

    public function addMainCat ()
    {
        $this->render ('addmaincat');
    }
    
    public function AddCatMain ()
    {
        $d['title']         = Common::VarSecure($_POST['title'], null);
        $d['subtitle']      = Common::VarSecure($_POST['subtitle'], null);
        $d['icon']          = Common::VarSecure($_POST['icon'], null);

        if (isset($_POST['access_groups'])) {
            $d['access_groups'] = implode('|', $_POST['access_groups']);
        } else {
            $d['access_groups'] = 0;
        }

        if (isset($_POST['access_admin'])) {
            $d['access_admin'] = implode('|', $_POST['access_admin']);
        } else {
            $d['access_admin'] = 1;
        }

        if (empty($d['title'])) {
            $return = array(
                'type' => 'error',
                'text' => 'Aucun titre transmis'
            );
        } else {
            $return = $this->models->AddCatMain ($d);
        }

        $return = $this->error('Forum', $return['text'], $return['type']);
        $this->redirect('Forum/maincategory?admin&option=pages', 3);
    }

    public function editmaincat ()
    {
        $menu[] = array('title' => constant('MAIN_CAT'), 'href' => 'Forum/maincategory?admin&option=pages', 'ico'  => 'fa-solid fa-circle-plus');

        if (is_numeric($this->data[2])) {
            $d['data'] = $this->models->getMainCat($this->data[2]);
            $this->set($d);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Forum', $array['text'], $array['type']);
            $this->redirect('Forum/maincategory?admin&option=pages', 3);
        }

        $this->render('editmaincat', $menu);
    }

    public function editCatMain ()
    {
        if (is_numeric($_POST['id'])) {
            $id = (int) $_POST['id'];
            $d['icon']     = Common::VarSecure($_POST['icon'], null);
            $d['title']    = Common::VarSecure($_POST['title'], null);
            $d['subtitle'] = Common::VarSecure($_POST['subtitle'], null);

            if (isset($_POST['access_groups'])) {
                $d['access_groups'] = implode('|', $_POST['access_groups']);
            } else {
                $d['access_groups'] = 0;
            }

            if (isset($_POST['access_admin'])) {
                $d['access_admin'] = implode('|', $_POST['access_admin']);
            } else {
                $d['access_admin'] = 1;
            }

            if (isset($_POST['activate'])) {
                $d['activate'] = 1;
            } else {
                $d['activate'] = 0;
            }

            $d['orderby'] = (int) $_POST['orderby'];
            $return = $this->models->editmaincat ($d, $id);

            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('SAVE_BDD_SUCCESS')
                );
                $this->error('Forum', $array['text'], $array['type']);
                $this->redirect('Forum/maincategory?admin&option=pages', 3); 
            } else {
                $array = array(
                    'type' => 'warining',
                    'text' => constant('SAVE_BDD_ERROR')
                );
                $this->error('Forum', $array['text'], $array['type']);
                $this->redirect('Forum/maincategory?admin&option=pages', 3); 
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Forum', $array['text'], $array['type']);
            $this->redirect('Forum/maincategory?admin&option=pages', 3);
        }  
    }

    public function deleditmaincat ()
    {
        if (is_numeric($this->data[2])) {
            $id = (int) $this->data[2];
            $return = $this->models->delMainCat($id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Forum', $array['text'], $array['type']);
                $this->redirect('Forum/maincategory?admin&option=pages', 3); 
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Forum', $array['text'], $array['type']);
                $this->redirect('Forum/maincategory?admin&option=pages', 3); 
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Forum', $array['text'], $array['type']);
            $this->redirect('Forum/maincategory?admin&option=pages', 3);
        }  
    }

    public function subForumDelete ()
    {
        if (is_numeric($this->data[2])) {
            $id = (int) $this->data[2];
            $return = $this->models->subForumDelete($id);
            if ($return === true) {
                $array = array(
                    'type' => 'success',
                    'text' => constant('DEL_SUCCESS')
                );
                $this->error('Forum', $array['text'], $array['type']);
                $this->redirect('Forum?admin&option=pages', 3); 
            } else {
                $array = array(
                    'type' => 'error',
                    'text' => constant('DEL_ERROR')
                );
                $this->error('Forum', $array['text'], $array['type']);
                $this->redirect('Forum?admin&option=pages', 3); 
            }
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Forum', $array['text'], $array['type']);
            $this->redirect('Forum?admin&option=pages', 3);
        }  
    }

    public function subForumEdit ()
    {
        $menu[] = array('title' => constant('HOME'), 'href' => 'Forum?admin&option=pages', 'ico'  => 'fa-solid fa-igloo');

        if (is_numeric($this->data[2])) {
            $id = (int) $this->data[2];
            $d['forum'] = $this->models->getForum ();
            $d['data'] = $this->models->getForumID ($id);
            $this->set($d);
            $this->render('subforumedit', $menu);
        } else {
            $array = array(
                'type' => 'error',
                'text' => constant('ID_ERROR')
            );
            $this->error('Forum', $array['text'], $array['type']);
            $this->redirect('Forum?admin&option=pages', 3);
        } 
    }

    public function editSendSubForum ()
    {
        $id = (int) $_POST['id'];
        $data['id_forum'] = (int) $_POST['id_forum'];
        $data['title'] = Common::VarSecure($_POST['title'], null);
        $data['subtitle'] = Common::VarSecure($_POST['subtitle'], null);
        $data['orderby'] = (int) $_POST['orderby'];
        $data['icon'] = Common::VarSecure($_POST['icon'], null);

        if (isset($_POST['lock_forum'])) {
            $data['lock_forum'] = 0;
        } else {
            $data['lock_forum'] = 1;
        }

        if (isset($_POST['access_groups'])) {
            $data['access_groups'] = implode('|', $_POST['access_groups']);
        } else {
            $data['access_groups'] = 1;
        }

        if (isset($_POST['access_admin'])) {
            $data['access_admin'] = implode('|', $_POST['access_admin']);
        } else {
            $data['access_admin'] = 1;
        }

        $return = $this->models->editSubForum($data, $id);

        if ($return === true) {
            $array = array(
                'type' => 'success',
                'text' => constant('SAVE_BDD_SUCCESS')
            );
            $this->error('Forum', $array['text'], $array['type']);
            $this->redirect('Forum?admin&option=pages', 3); 
        } else {
            $array = array(
                'type' => 'warining',
                'text' => constant('SAVE_BDD_ERROR')
            );
            $this->error('Forum', $array['text'], $array['type']);
            $this->redirect('Forum?admin&option=pages', 3); 
        }
    }
}