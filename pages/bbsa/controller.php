<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.3]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace Belcms\Pages\Controller;

use BelCMS\Core\Captcha;
use BelCMS\Core\eMail;
use BelCMS\Core\Notification;
use BelCMS\Core\Pages;
use BelCMS\Core\Secure;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class bbsa extends Pages
{
    var $useModels = 'Modelsbbsa';

    function index ()
    {
        $a['captcha'] = (new Captcha())->createCaptcha();
        $this->set($a);
        $this->render('index');
    }

    public function send ()
    {
        if (Captcha::verify()) {
            $a['name']     = Common::VarSecure($_POST['name']);
            $a['username'] = Common::VarSecure($_POST['username']);

            if (isValidNiss($_POST['national_number'])) {
                $a['national_number'] = $_POST['national_number'];
            } else {
                Notification::error('Erreur de numero NSS', 'ERREUR NSS');
                $this->redirect('bbsa', 3);
                return;
            }

            if ($_POST['lieu'] == 'Farciennes') {
                $a['date_inscription']  = Common::DatetimeSQL($_POST['farciennes_date'], false, 'Y-m-d');
            } else {
                $a['date_inscription']  = Common::DatetimeSQL($_POST['montignie_dates'], false, 'Y-m-d');
            }

            $a['lieu']              = Common::VarSecure($_POST['lieu']);
            $a['gsm']               = isValidBelgianGsm($_POST['gsm']);
            $a['email']             = Secure::isMail($_POST['email']);
            $a['birthday']          = Common::DatetimeSQL($_POST['birthday'], false, 'Y-m-d');

            $return = $this->models->send($a);

            if ($return === false) {
                Notification::error(constant('ERROR_INSERT_BDD'), 'Erreur d\'envoie de donnée');
            } else {
                self::sendMailPass($a);
                Notification::success('L\'inscription à un test d\'admission « BBSA/BSSA » a bien été envoyée.', 'BBSA/BSSA');
            }
        } else {
            $error = $_SESSION['CAPTCHA_ERROR'] ?? null;
            Notification::error(htmlspecialchars($error['message']), 'Captcha');
            $this->redirect('index.php', 3);
            return;
        }

        $this->redirect('index.php', 3);

    }

    public function sendMailPass ($array)
    {
        $body = '<!DOCTYPE html>
                    <html lang="fr">
                    <head>
                        <meta charset="UTF-8">
                    </head>
                    <body style="margin:0; padding:0; background-color:#f4f4f4;">
                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4;">
                            <tr>
                                <td align="center">
                                    <table class="container" width="600" cellpadding="0" cellspacing="0"
                                        style="background-color:#ffffff; padding:40px; font-family:Arial, sans-serif; border-radius:8px;">
                                        <tr>
                                            <td align="center" style="padding-bottom:20px;">
                                                <h2 style="margin:0; color:#6c5ce7;">Inscription au teste d\'admission « BBSA/BSSA »</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color:#333333; font-size:16px; line-height:1.5;">Bonjour Fabrice, <br><br>
                                                <h3>Il y a eu une inscription pour  un test d\'admission « BBSA/BSSA »</h3>
                                                <br><br>
                                                <table style="display:table;background:#f1f1f1; padding:10px 20px; border-radius:6px; font-size:18px; letter-spacing:1px;width:100%;"> 
                                                    <tr>
                                                        <td>Nom : </td>
                                                        <td>'.$array['name'].'</td></tr>
                                                    <tr>
                                                        <td>Prénom : </td>
                                                        <td>'.$array['username'].'</td></tr>
                                                    <tr>
                                                        <td>N° GSM : </td>
                                                        <td>'.$array['gsm'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adresse e-mail : </td>
                                                        <td><a href="mailto:'.$array['email'].'">'.$array['email'].'</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date : </td>
                                                        <td>'.Common::TransformDate($array['date_inscription'], 'LONG', 'NONE').'</td>
                                                    </tr>
                                                    <tr>
                                                        <td>lieu : </td>
                                                        <td>'.$array['lieu'].'</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding-top:30px; font-size:12px; color:#999999;">' .constant('MAIL_BY_BELCMS') . '</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>';
        $email = new eMail;
        $email->addAdress('contact@aseh.be');
        $email->subject('test d\'admission « BBSA/BSSA »');
        $email->body($body);
        $email->submit();
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