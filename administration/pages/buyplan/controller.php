<?php

/**
 * Bel-CMS [Content management system]
 *  * @version 4.1.1 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

use BelCMS\Core\Notification;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class BuyPlan extends AdminPages
{
    var $admin  = true; // Admin suprême uniquement (Groupe 1);
    var $active = true; // Activation/désactivation par FTP
    var $bdd    = 'ModelsBuy'; // Nom du Models (récupération de données)

    public function index()
    {
        $menu[] = array('title' => 'Accueil', 'href' => 'buyplan?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo');

        $data['users'] = $this->models->getUsers();
        $this->set($data);

        $this->render ('index', $menu);
    }

    public function content ()
    {
        if (isset($_GET['key']) and strlen($_GET['key']) == '16') {
            $menu[] = array('title' => 'Accueil', 'href' => 'buyplan?Admin&option=pages', 'ico'  => 'fa-solid fa-igloo','active' => 'active');
            $data['content'] = $this->models->getInfosUser($_GET['key']);
            $this->set($data);
            $this->render ('content', $menu);
        } else {
            #######################################################
            Notification::error(text: constant('ID_ERROR'), title: 'Hébérgements');
            $this->redirect('buyplan?admin&option=pages', 3);
        }
    }

    public function addplan ()
    {
        $plan = (int) $_POST['plan'];
        if (strlen($_POST['key']) != 16) {
            Notification::error(text: constant('ID_ERROR'), title: 'Hébérgements');
            $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
            $this->redirect($referer, 3);
            return;
        } else {
            $key = $_POST['key'];
        }
        #####################################
        # Plan 1
        #####################################
        if ($plan == 1) {
            #####################################
            # Récupère le ndd et l'mail
            #####################################
            $email_1   = $_POST['emailbelcms_1'];
            $website_1 = $_POST['website_1'];
            #####################################
            # Regarde si le mail n'existe pas
            #####################################
            $checkMails = $this->models->checkMails($email_1);
            if ($checkMails === false) {
                Notification::error(text: 'Message électronique déjà pris.', title: 'Hébérgements');
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                $this->redirect($referer, 3);
                return;
            }
            #####################################
            # Regarde si le sous-domaine a déjà été pris.
            #####################################
            $checkNDD = $this->models->checkNDD($website_1);
            if ($checkNDD === false) {
                Notification::error(text: 'Nom de sous-domaine déjà pris.', title: 'Hébérgements');
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                $this->redirect($referer, 3);
                return;
            }
            if ($checkNDD === true and $checkMails === true) {
                $insert_mail = $this->models->sendMails ($email_1);
                $insert_ndd  = $this->models->sendNdd ($website_1);
                if ($insert_mail === true and $insert_ndd === true) {
                    $this->models->updateUser ($key, $plan);
                    Notification::success(text: 'La sauvegarde a effectué correctement.', title: 'Hébérgements');
                    $this->redirect('buyplan?admin&option=pages', 3);
                } else {
                    Notification::error(text: 'La sauvegarde n\'a pas pu être effectuée correctement.', title: 'Hébérgements');
                    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                    $this->redirect($referer, 3);
                }
            }
        } else if ($plan == 2) {
            $message = null;
            #####################################
            # Récupère le ndd et l'mail
            #####################################
            $email_1   = $_POST['emailbelcms_1'];
            $email_2   = $_POST['emailbelcms_2'];
            $email_3   = $_POST['emailbelcms_3'];
            $website_1 = $_POST['website_1'];
            $website_2 = $_POST['website_2'];
            #####################################
            # Regarde si le mail 1 n'existe pas
            #####################################
            $checkMails = $this->models->checkMails($email_1);
            if ($checkMails === false) {
                Notification::error(text: 'Message électronique déjà pris.', title: 'Hébérgements');
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                $this->redirect($referer, 3);
                return;
            }
            if (!empty($_POST['email_2'])) {
                $checkMails2 = $this->models->checkMails($email_2);
                if ($checkMails2 === false) {
                    $message .= 'Votre 2 mails a déjà été pris<br>';
                } else {
                    
                }
            }
            if (!empty($_POST['email_3'])) {
                $checkMails3 = $this->models->checkMails($email_3);
                if ($checkMails3 === false) {
                    $message .= 'Votre 3 mails a déjà été pris<br>';
                }
            }
            #####################################
            # Regarde si le sous-domaine a déjà été pris.
            #####################################
            $checkNDD = $this->models->checkNDD($website_1);
            if ($checkNDD === false) {
                Notification::error(text: 'Nom de sous-domaine déjà pris.', title: 'Hébérgements');
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                $this->redirect($referer, 3);
                return;
            }
            if (!empty($website_2)) {
                $website_2 = $this->models->checkMails($website_2);
                if ($website_2 === false) {
                    $message .= 'Votre sous-domaine demandé a déjà été pris.s<br>';
                } else {
                    $this->models->sendNdd ($website_2);
                }
            }

            $br = ($message == null) ? '' : '<br>';
            $return = 'La sauvegarde a effectué correctement'.$br.$message;

            if ($checkNDD === true and $checkMails === true) {
                $insert_mail = $this->models->sendMails ($email_1);
                if ($insert_mail === true and $insert_ndd === true) {

                    $this->models->updateUser ($key, $plan);
                    Notification::success(text: $return, title: 'Hébérgements');
                    $this->redirect('buyplan?admin&option=pages', 3);
                } else {
                    Notification::error(text: 'La sauvegarde n\'a pas pu être effectuée correctement.', title: 'Hébérgements');
                    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                    $this->redirect($referer, 3);
                }
            }
        } else if ($plan == 3) {
            $message = null;
            #####################################
            # Récupère le ndd et l'mail
            #####################################
            $email_1   = $_POST['emailbelcms_1'];
            $email_2   = $_POST['emailbelcms_2'];
            $email_3   = $_POST['emailbelcms_3'];
            $email_4   = $_POST['emailbelcms_4'];
            $email_5   = $_POST['emailbelcms_5'];
            $website_1 = $_POST['website_1'];
            $website_2 = $_POST['website_2'];
            $website_3 = $_POST['website_3'];
            #####################################
            # Regarde si le mail 1 n'existe pas
            #####################################
            $checkMails = $this->models->checkMails($email_1);
            if ($checkMails === false) {
                Notification::error(text: 'Message électronique déjà pris.', title: 'Hébérgements');
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                $this->redirect($referer, 3);
                return;
            }
            if (!empty($_POST['email_2'])) {
                $checkMails2 = $this->models->checkMails($email_2);
                if ($checkMails2 === false) {
                    $message .= 'Votre 2 mails a déjà été pris<br>';
                }
            }
            if (!empty($_POST['email_3'])) {
                $checkMails3 = $this->models->checkMails($email_3);
                if ($checkMails3 === false) {
                    $message .= 'Votre 3 mails a déjà été pris<br>';
                }
            }
            if (!empty($_POST['email_4'])) {
                $checkMails4 = $this->models->checkMails($email_4);
                if ($checkMails4 === false) {
                    $message .= 'Votre 4 mails a déjà été pris<br>';
                }
            }
            if (!empty($_POST['email_5'])) {
                $checkMails5 = $this->models->checkMails($email_5);
                if ($checkMails5 === false) {
                    $message .= 'Votre 5 mails a déjà été pris<br>';
                }
            }
            #####################################
            # Regarde si le sous-domaine a déjà été pris.
            #####################################
            $checkNDD = $this->models->checkNDD($website_1);
            if ($checkNDD === false) {
                Notification::error(text: 'Nom de sous-domaine déjà pris.', title: 'Hébérgements');
                $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                $this->redirect($referer, 3);
                return;
            }
            if (!empty($website_2)) {
                $website_2 = $this->models->checkMails($website_2);
                if ($website_2 === false) {
                    $message .= 'Votre sous-domaine demandé a déjà été pris.s<br>';
                }
            }

            if (!empty($website_3)) {
                $website_3 = $this->models->checkMails($website_3);
                if ($website_3 === false) {
                    $message .= 'Votre sous-domaine demandé a déjà été pris.s<br>';
                }
            }

            $br = ($message == null) ? '' : '<br>';
            $return = 'La sauvegarde a effectué correctement'.$br.$message;

            if ($checkNDD === true and $checkMails === true) {
                $insert_mail = $this->models->sendMails ($email_1);
                $insert_ndd  = $this->models->sendNdd ($website_1);
                if ($insert_mail === true and $insert_ndd === true) {
                    $this->models->updateUser ($key, $plan);
                    Notification::success(text: $return, title: 'Hébérgements');
                    $this->redirect('buyplan?admin&option=pages', 3);
                } else {
                    Notification::error(text: 'La sauvegarde n\'a pas pu être effectuée correctement.', title: 'Hébérgements');
                    $referer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : 'buyplan?admin&option=pages';
                    $this->redirect($referer, 3);
                }
            }
        } else {
            Notification::error(text: constant('ID_ERROR'), title: 'Hébérgements');
            $this->redirect('buyplan?admin&option=pages', 3);
        }
    }
}