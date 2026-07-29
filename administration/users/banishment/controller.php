<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Banishment as CoreBanishment;
use BelCMS\Core\Interaction;
use BelCMS\Core\Notification;
use BelCMS\Core\Secure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class banishment extends AdminPages
{
    var $admin  = true;
    var $active = true;
    var $bdd    = 'BanModels';
    private const LEVELS = [
        9 => ['interval' => 'PT1M',  'label' => '1 minute'],
        8 => ['interval' => 'PT5M',  'label' => '5 minutes'],
        7 => ['interval' => 'PT15M', 'label' => '15 minutes'],
        6 => ['interval' => 'PT1H',  'label' => '1 heure'],
        5 => ['interval' => 'P1D',   'label' => '1 jour'],
        4 => ['interval' => 'P7D',   'label' => '7 jours'],
        3 => ['interval' => 'P1M',   'label' => '1 mois'],
        2 => ['interval' => 'P6M',   'label' => '6 mois'],
        1 => ['interval' => 'P1Y',   'label' => '1 an'],
        0 => ['interval' => null,    'label' => 'Définitif'],
    ];

    public function index ()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'banishment?admin&option=users', 'ico'  => 'fa-solid fa-igloo', 'active' => 'active');
        $menu[] = array('title' => 'Ajouter un bannissement', 'href' => 'banishment/add?admin&option=users', 'ico'  => 'fa-solid fa-pen-to-square');

        $d['data'] = $this->models->getBan();
        $this->set($d);
        $this->render('index', $menu);
    }

    public function delete()
    {
        $id = is_string($this->data[2]);
        if($id === true) {
            $return = $this->models->delete($this->data[2]);
            if ($return === true) {
                Notification::success('Le bannissement a été levé avec succès.', 'Bannissement');
                $this->redirect('banishment?Admin&option=users', 2);
            } else {
                Notification::warning(constant('DEL_BDD_ERROR'), 'Bannissement');
                $this->redirect('banishment?Admin&option=users', 2);
            }
        } else {
            ####################################################### 
            $msg = $_SESSION['USER']->user->username.' '.constant('NOTIFICATION_BYPASS');
            $interaction = new Interaction();
            $interaction->status('red');
            $interaction->message($msg);
            $interaction->title('Activités');
            $interaction->author(Common::GetIp());
            $interaction->setAdmin();
            #######################################################
            $return = array('text' => constant('ADMIN_TEXT_FALSE_ID'), 'type' => 'warning');
            $this->error(get_class($this), $return['text'], $return['type']);
            $this->redirect('banishment?Admin&option=users', 2);
            return;
        }
    }

    public function add ()
    {
        $this->render('add');
    }

    public function sendadd ()
    {
        debug($_POST);
        $ip = Secure::isIp($_POST) ? $_POST['ip'] : false;

        if (empty($ip) or $ip === false) {
             Notification::warning(constant('DEL_BDD_ERROR'), 'Bannissement');
        }

        $ban = new CoreBanishment();
        
        $ban = new Banishment();

        $ban->manualBan(
            'PT15M',
            $ip,
            $_SESSION['USER']->user->username,
            'Flood'
        );

        $ban = new \BelCMS\Core\Banishment();
        $ban->ban(
            ip: $ip,
            duration: $_POST['tirme'], // ou null = définitif
            reason: Common::VarSecure($_POST['reason'], true),
            author: $_SESSION['USER']->user->username
        );
    }

    private function getExpireDate(int $level): ?string
    {
        if (!isset(self::LEVELS[$level])) {
            return null;
        }

        $interval = self::LEVELS[$level]['interval'];

        if ($interval === null) {
            return null;
        }

        $date = new \DateTime();
        $date->add(new \DateInterval($interval));

        return $date->format('Y-m-d H:i:s');
    }
}