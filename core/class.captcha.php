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

namespace BelCMS\Core;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

################################################
# Class du CMS Captcha
################################################
final class Captcha
{
    public function createCaptcha () : array
    {
        $numberOneRand = rand(1, 9);
        $numberTwoRand = rand(1, 9);
        $OVERALL = $numberOneRand + $numberTwoRand;

        $_SESSION['CAPTCHA']['CODE'] = $numberOneRand.' + '. $numberTwoRand;
        $array = array('code' => $OVERALL, 'fail1' => rand(1, 20), 'fail_2' => rand(1, 20), 'fail_3' => rand(1, 20), 'fail_4' => rand(1, 20), 'fail_5' => rand(1, 20));
        self::sendBDDInsert($OVERALL);
        return $array;
    }

    private function sendBDDInsert($code)
    {
        self::destructCaptcha();
        $insert['timelast'] = time();
        $insert['code'] = $code;
        $insert['IP'] = Common::GetIp();
        $cryptTime = Common::encryptDecrypt($insert['timelast'], $_SESSION['CONFIG']['CMS_KEY_ADMIN']);
        setcookie(
            'BELCMS_CAPTCHA_'.$_SESSION['CONFIG']['CMS_COOKIES'],
            $cryptTime,
            time()+60*60*24*30,
            "/",
            $_SERVER['HTTP_HOST'],
            true,
            true
        );
        $sql = new BDD;
        $sql->table('TABLE_CAPTCHA');
        $sql->insert($insert);
    }

    private function destructCaptcha ()
    {
        $sql = new BDD;
        $sql->table('TABLE_CAPTCHA');
        $sql->where(array('name' => 'IP', 'value' => Common::GetIp()));
        $sql->delete();
    }

    public static function verifCaptcha ($code)
    {
        if (isset($_REQUEST['captcha']) and !empty($_REQUEST['captcha'])) {
            return false;
        }
        $code = Common::VarSecure($code, null);
        $where[] = array('name' => 'IP', 'value' => Common::GetIp());
        $where[] = array('name' => 'code', 'value' => $code);
        $sql = new BDD;
        $sql->table('TABLE_CAPTCHA');
        $sql->where($where);
        $sql->queryOne();
        if (!empty($sql->data)) {
            $timeCurrent = time();
            $testingTime = $timeCurrent - $sql->data->timelast;
            if ($testingTime >= $_SESSION['CONFIG']['CMS_CAPTCHA_TIME']) {
                $del = new BDD;
                $del->table('TABLE_CAPTCHA');
                $del->where(array('name' => 'IP', 'value' => Common::GetIp()));
                $del->delete();
                setcookie('BELCMS_CAPTCHA_'.$_SESSION['CONFIG']['CMS_COOKIES'], 'data', time()-60*60*24*365, '/', $_SERVER['HTTP_HOST'], false);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}