<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

namespace BelCMS\Core;

require ROOT.DS.'core'.DS.'PHPMailer'.DS.'phpmailer.lang-fr.php';
require ROOT.DS.'core'.DS.'PHPMailer'.DS.'Exception.php';
require ROOT.DS.'core'.DS.'PHPMailer'.DS.'PHPMailer.php';
require ROOT.DS.'core'.DS.'PHPMailer'.DS.'SMTP.php';

use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class eMail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        self::mailConfig();
    }

	private function getConfigSql (): object
	{
		$return = (object) array();
		$sql = new BDD();
		$sql->table('TABLE_MAIL_CONFIG');
		$sql->queryAll();
		$data = $sql->data;
		foreach ($data as $a) {
			$return->{$a->name} = $a->config;
		}
		return $return;
	}

    private function mailConfig ()
    {
        $data = self::getConfigSql();

        $this->mail->Host       = $data->host;
        $this->mail->CharSet    = $data->charset;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $data->username;
        $this->mail->Password   = $data->Password;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = $data->Port;
        $this->mail->setFrom($data->setFrom, $data->fromName);
        $this->mail->isHTML(true);
    }

    public function addAdress ($mail = null)
    {
        $this->mail->addAddress($mail);
    }

    public function subject ($data = null)
    {
        $this->mail->Subject = $data;
    }

    public function body ($data = null)
    {
        $this->mail->Body = $data;
    }

    public function submit ()
    {
        try {
            return $this->mail->send();
        } catch (Exception $e) {
            echo "Erreur : {$this->mail->ErrorInfo}";
        }
    }
}
