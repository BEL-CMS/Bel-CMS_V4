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

use BelCMS\Core\Config;
use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\User;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Members extends Pages
{
    var $useModels = 'Members';

    public function index ()
    {
        $config = Config::GetConfigPage('members');
        $a['pagination'] = $this->pagination($config->config['MAX_PPR'], 'Members', constant('TABLE_USERS'));
        $return = $this->models->members();
        $a['members'] = $return;
        $this->set($a);
        $this->render ('index');
    }

    public function detail ()
    {
        $name = Common::VarSecure($this->data[2], null);

        if (is_null($name)) {
            Notification::warning('Aucun nom  transmis !', 'Utilisateurs');
            $this->redirect('Members', 2);
            return false;
        }

        $a = $this->models->getMembers ($name);
        $b['user'] = User::getInfosUserAll($a->hash_key);
        $this->set($b);
        $this->render('detail');
    }
}