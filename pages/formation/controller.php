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

namespace Belcms\Pages\Controller;

use BelCMS\Core\Captcha;
use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\Secure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Formation extends Pages
{
    var $useModels = 'Formation';

    public function index ()
    {
        $return = $this->models->getActif();
        if ($return === false) {
            Notification::infos('Il n\'y a pas d\'entraînement « Osez sauver » à disposition pour l\'instant.', '« Osez sauver »');
        } else {
            $data['id']           = $return->id;
            $data['heure_debut']  = \DateTime::createFromFormat('H:i:s', $return->heure_debut);
            $data['heure_debut']  = $data['heure_debut']->format('H\hi');
            $data['heure_fin']    = \DateTime::createFromFormat('H:i:s', $return->heure_fin);
            $data['heure_fin']    = $data['heure_fin']->format('H\hi');
            $data['date']         = Common::TransformDate($return->date_activite, 'FULL');
            $data['lieu']         = $return->lieu;
            $this->set($data);
            $a['captcha'] = (new Captcha())->createCaptcha();
            $this->set($a);
            $this->render('index');
        }
    }

    public function send ()
    {
        if (Captcha::verify()) {
            $insert['name']     = Common::VarSecure($_POST['name']);
            $insert['username'] = Common::VarSecure($_POST['username']);
            $insert['birthday'] = Common::DatetimeSQL($_POST['birthday'], false, 'Y-m-d');

            if (isValidNiss($_POST['national_number'])) {
                $insert['national_number'] = $_POST['national_number'];
            } else {
                Notification::error('Erreur de numero NSS', 'ERREUR NSS');
                $this->redirect('formation', 3);
                return;
            }

            $insert['gsm']   = isValidBelgianGsm($_POST['gsm']);
            $insert['email'] = Secure::isMail($_POST['email']);

            $return = $this->models->send($insert);

            if ($return === false) {
                Notification::error(constant('ERROR_INSERT_BDD'), 'Erreur d\'envoie de donnée');
            } else {
                Notification::success('L\'inscription à la formation « Osez sauver » a bien été envoyée.', 'Formation Osez sauver');
            }
        } else {
            $error = $_SESSION['CAPTCHA_ERROR'] ?? null;
            Notification::error(htmlspecialchars($error['message']), 'Captcha');
		    $this->redirect('index.php', 3);
            return;
        }
        $this->redirect('index.php', 3);
    }
}
function isValidNiss(string $niss): bool
{
    $niss = preg_replace('/[^0-9]/', '', $niss);

    if (strlen($niss) !== 11) {
        return false;
    }

    $number = substr($niss, 0, 9);
    $check  = (int) substr($niss, 9, 2);

    // Personnes nées avant 2000
    $calc = 97 - ((int)$number % 97);

    if ($calc === $check) {
        return true;
    }

    // Personnes nées à partir de 2000
    $calc = 97 - ((int)('2'.$number) % 97);

    return $calc === $check;
}
function isValidBelgianGsm(string $gsm)
{
    $gsm = preg_replace('/[\s.-]/', '', trim($gsm));
    return preg_match('/^(?:\+32|0)4\d{8}$/', $gsm) === 1 ? $gsm  : false;
}