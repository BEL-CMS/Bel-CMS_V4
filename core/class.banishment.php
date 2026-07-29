<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.1.2 [PHP8.5]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
*/

namespace BelCMS\Core;

use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
}
/* ###   TABLE_BANISHMENT   ### */
/* ### id, who, author, ip, mail, date, end_ban, time_ban, reason, number   ### */
/* Ban manuel 
/* 
    $ban->manualBan(
        'PT1H',
        '192.168.1.1',
        null,
        'Trop de tentatives de connexion'
    );
*/
final class Banishment
{
    private ?string $countDate = null;
    private ?string $reason = null;
    private int $number = 9;
    private ?string $banId = null;
    private ?string $fuseau = null;
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
    private const LOG_INVALID_ID = 'INVALID_ID';
    private const LOG_SQL        = 'SQL_INJECTION';
    private const LOG_XSS        = 'XSS';
    private const LOG_CSRF       = 'CSRF';
    private const LOG_LOGIN      = 'LOGIN_FAIL';
    private array $requireId = [];

    public function __construct()
    {
        $file = ROOT . DS . 'core' . DS . 'class.routes.php';

        if (is_file($file)) {
            $this->requireId = require $file;
        }
    }

    public function addBan(): bool
    {
        $ban = $this->getBan();

        if ($ban === null) {
            return $this->createBan();
        }

        $last = new \DateTime($ban['last_attempt']);
        $reset = new \DateTime('-30 days');

        if ($last < $reset) {
            $ban['number'] = 9;
        }

        return $this->updateBan($ban);
    }

    private function generateBanId(): string
    {
        return Common::genererCodeFormatte();
    }

    public function run(): void
    {
        /*
        * Vérifie un bannissement existant
        */
        if ($this->check()) {
            $this->render();
            return;
        }
        /*
        * Contrôle sécurité URL
        */
        $this->BanForIdFail();
    }

    private function createBan(): bool
    {
        $level = 9;

        $banId = $this->generateBanId();

        $data = [
            'ban_id'        => $banId,
            'ip'            => Common::GetIp(),
            'author'        => $this->author ?? null,
            'number'        => $level,
            'reason'        => $this->reason ?? 'Sécurité automatique',
            'created_at'    => date('Y-m-d H:i:s'),
            'last_attempt'  => date('Y-m-d H:i:s'),
            'expires_at'    => $this->getExpireDate($level),
            'attempts'      => 1,
            'user_agent'    => $_SERVER['HTTP_USER_AGENT'] ?? null,
            'active'        => 1
        ];

        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT');
        $sql->insert($data);

        $this->banishmentLogs($data);

        return $sql->data !== false;
    }

    private function updateBan(array $ban): bool
    {
        $level = max(0, $ban['number'] - 1);

        $data = [
            'ban_id'        => $ban['ban_id'],
            'ip'            => $ban['ip'],
            'author'        => $ban['author'],
            'number'        => $level,
            'reason'        => $this->reason ?? $ban['reason'],
            'last_attempt'  => date('Y-m-d H:i:s'),
            'expires_at'    => $this->getExpireDate($level),
            'attempts'      => $ban['attempts'] + 1
        ];


        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT');
        $sql->where('WHERE `id` = "'.$ban['id'].'"');
        $sql->update($data);
        // Historique
        $this->banishmentLogs($data);

        return $sql->data;
    }


    private function getBan(): ?array
    {
        $ip = Common::GetIp();

        $sql = new BDD();
        $sql->isObject(false);

        $sql->table('TABLE_BANISHMENT');
        $sql->where(
            'WHERE `ip` = "'.$ip.'" 
            AND `active` = 1
            ORDER BY id DESC 
            LIMIT 1'
        );
        $sql->queryAll();

        return $sql->data[0] ?? null;
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

    public function isBanned(): bool
    {
        $ban = $this->getBan();

        if ($ban === null) {
            return false;
        }

        if ($ban['number'] === 0) {
            return true;
        }

        if (strtotime($ban['expires_at']) > time()) {
            return true;
        }

        return false;
    }

    private function check(): bool
    {
        $ip = Common::GetIp();

        $sql = new BDD();
        $sql->isObject(false);

        $sql->table('TABLE_BANISHMENT');
        $sql->where(
            'WHERE `ip` = "'.$ip.'" 
            AND `active` = 1 
            ORDER BY `id` DESC 
            LIMIT 1'
        );
        $sql->queryAll();
        $ban = $sql->data[0] ?? null;
        /*
        * Aucun bannissement trouvé
        */
        if ($ban === null) {
            return false;
        }
        /*
        * Chargement des informations du ban
        */
        $this->number = (int)$ban['number'];
        $this->banId  = $ban['ban_id'];
        $this->reason = $ban['reason'];
        /*
        * Bannissement définitif
        */
        if ($this->number === 0 || $ban['expires_at'] === null) {
            $this->countDate = null;
            return true;
        }
        /*
        * Vérification de la date d'expiration
        */
        $now = new \DateTime();
        try {
            $expire = new \DateTime($ban['expires_at']);
        } catch (\Exception $e) {
            // Date invalide = on désactive le ban
            $this->unban($ban['ban_id']);
            return false;
        }
        /*
        * Bannissement encore actif
        */
        if ($now < $expire) {
            $this->countDate = $expire->format('Y-m-d H:i:s');
            return true;
        }
        /*
        * Bannissement terminé
        */
        $this->unban(
            $ban['ban_id'],
            'Expiration automatique du bannissement'
        );

        return false;
    }

    private function banishmentLogs(array $data): bool
    {
        $insert = [
            'ban_id'     => $data['ban_id'] ?? null,
            'ip'         => $data['ip'] ?? Common::GetIp(),
            'action'     => $data['action'] ?? 'UNKNOWN',
            'reason'     => $data['reason'] ?? null,
            'user_agent' => $data['user_agent'] ?? ($_SERVER['HTTP_USER_AGENT'] ?? null),
            'method'     => $data['method'] ?? ($_SERVER['REQUEST_METHOD'] ?? null),
            'url'        => $data['url'] ?? ($_SERVER['REQUEST_URI'] ?? null),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT_LOGS');
        $sql->insert($insert);


        return (bool) $sql->rowCount;
    }

    public function unban(string $banId, string $reason = 'Débanni automatiquement'): bool
    {
        $ban = $this->getBanById($banId);

        if ($ban === null) {
            return false;
        }

        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT');

        $sql->where('WHERE `ban_id` = "'.$banId.'"');

        $sql->update([
            'active'       => 0,
            'last_attempt' => date('Y-m-d H:i:s')
        ]);

        if (!$sql->data) {
            return false;
        }

        // Log du débannissement
        $this->banishmentLogs([
            'ban_id'     => $ban['ban_id'],
            'ip'         => $ban['ip'],
            'author'     => $ban['author'],
            'number'     => $ban['number'],
            'reason'     => $reason,
            'action'     => 'UNBAN'
        ]);

        return true;
    }

    public function getBanById(string $banId): ?array
    {
        $sql = new BDD();

        $sql->table('TABLE_BANISHMENT');
        $sql->isObject(false);

        $sql->where([
            'name'  => 'ban_id',
            'value' => $banId
        ]);

        $sql->queryOne();

        return $sql->data ?: null;
    }

    private function getBanByIp(string $ip): ?array
    {
        $sql = new BDD();
        $sql->isObject(false);

        $sql->table('TABLE_BANISHMENT');
        $sql->where('WHERE `ip` = "'.$ip.'" AND `active` = 1');
        $sql->queryAll();

        return $sql->data[0] ?? null;
    }

    public function manualBan( string $duration, ?string $ip = null, ?string $author = null, string $reason = 'Bannissement manuel', ?int $level = null): ?string
    {
        $ban = $this->getBanByIp($ip);

        if ($ban !== null) {

            return $this->updateManualBan(
                $ban,
                $duration,
                $reason
            );

        }

        return $this->createManualBan(
            $duration,
            $ip,
            $author,
            $reason,
            $level
        );
     }

    private function getLevelFromDuration(string $duration): int
    {
        foreach (self::LEVELS as $level => $data) {

            if ($data['interval'] === $duration) {
                return $level;
            }
        }

        return 0;
    }

    private function isStaticFile(): bool
    {
        if (!isset($_SERVER['REQUEST_URI'])) {
            return false;
        }

        $extension = strtolower(pathinfo($_SERVER['REQUEST_URI'], PATHINFO_EXTENSION));

        return in_array($extension, [
            'css',
            'js',
            'png',
            'jpg',
            'jpeg',
            'gif',
            'ico',
            'svg',
            'webp',
            'woff',
            'woff2',
            'ttf'
        ]);
    }

    private function createManualBan(string $duration, ?string $ip, ?string $author, string $reason, ?int $level = null): ?string
    {
        $banId = $this->generateBanId();

        $expires = null;

        if ($level !== 0) {
            $date = new \DateTime();
            $date->add(new \DateInterval($duration));
            $expires = $date->format('Y-m-d H:i:s');
        }

        $data = [
            'ban_id'       => $banId,
            'ip'           => $ip,
            'author'       => $author,
            'number'       => $level ?? $this->getLevelFromDuration($duration),
            'reason'       => $reason,
            'created_at'   => date('Y-m-d H:i:s'),
            'last_attempt' => date('Y-m-d H:i:s'),
            'expires_at'   => $expires,
            'attempts'     => 1,
            'user_agent'   => $_SERVER['HTTP_USER_AGENT'] ?? null,
            'active'       => 1
        ];

        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT');
        $sql->insert($data);

        if (!$sql->data) {
            return null;
        }

        $data['action'] = 'MANUAL_BAN';

        $this->banishmentLogs($data);

        return $banId;
    }

    private function updateManualBan(array $ban, string $duration, string $reason): ?string
    {
        $date = new \DateTime();
        $date->add(new \DateInterval($duration));

        $data = [
            'number'       => $this->getLevelFromDuration($duration),
            'reason'       => $reason,
            'last_attempt' => date('Y-m-d H:i:s'),
            'expires_at'   => $date->format('Y-m-d H:i:s'),
            'attempts'     => $ban['attempts'] + 1
        ];

        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT');

        $sql->where('WHERE `ban_id` = "'.$ban['ban_id'].'"');

        $sql->update($data);


        if (!$sql->data) {
            return null;
        }

        $log = array_merge($ban, $data);
        $log['action'] = 'MANUAL_UPDATE';

        $this->banishmentLogs($log);

       return $ban['ban_id'];
    }

	#########################################
	# Return of rendering
	#########################################
    public function render(): void
    {
        $data = [
            'countDate' => $this->countDate,
            'reason'    => $this->reason,
            'number'    => $this->number,
            'banId'     => $this->banId
        ];

        ob_start();

        require_once constant('DIR_ASSETS').'templates'.DS.'ban'.DS.'index.php';

        $render = ob_get_clean();

        echo $render;
        die();
    }

    ##################################################
    # Blocage automatique, identifiant [NO-ID NUMERIC]
    ##################################################
    private function BanForIdFail(): bool
    {
        if ($this->isStaticFile()) {
            return true;
        }
        $page = strtolower((string) Dispatcher::page());
        $view = strtolower((string) Dispatcher::view());
        $id   = Dispatcher::id();
        /*
        * Route non surveillée
        */
        if (!isset($this->requireId[$page][$view])) {
            return true;
        }
        /*
        * Aucun paramètre
        */
        if ($id === null || $id === '') {
            return true;
        }
        /*
        * Type attendu
        */
        $type = $this->requireId[$page][$view];
        $valid = match ($type) {

            'numeric' => ctype_digit((string)$id),

            'slug' => preg_match(
                '/^[a-z0-9\-]+$/i',
                (string)$id
            ),

            default => true
        };
        /*
        * Identifiant invalide
        */
        if (!$valid) {

            $msg = htmlspecialchars(
                "Tentative d'identifiant invalide.<br>
                Page : ".$page."<br>
                Vue : ".$view."<br>
                ID : ".$id,
                ENT_QUOTES,
                'UTF-8'
            );

            $this->strike(
                self::LOG_INVALID_ID,
                $msg,
                'PT1M',
                2,
                10
            );

            return false;
        }


        return true;
    }
    private function countLogs(string $ip, string $action, int $minutes): int
    {
        $date = new \DateTime();
        $date->modify('-'.$minutes.' minutes');
        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT_LOGS');
        $sql->where(
            'WHERE `ip` = "'.$ip.'" 
            AND `action` = "'.$action.'"
            AND `created_at` >= "'.$date->format('Y-m-d H:i:s').'"
            AND `method` = "GET"'
        );
        $sql->queryAll();
        return count($sql->data);
    }
    
    private function strike(string $action, string $reason, string $duration = 'PT1M', int $limit = 2, int $window = 10): bool
    {
        $ip = Common::GetIp();
        /*
        * On compte les tentatives précédentes
        */
        $count = $this->countLogs(
            $ip,
            $action,
            $window
        );
        /*
        * On enregistre toujours la tentative
        */
        if (($count + 1) < $limit) {

            $this->banishmentLogs([
                'action'     => $action,
                'ip'         => $ip,
                'reason'     => $reason,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
                'method'     => $_SERVER['REQUEST_METHOD'] ?? null,
                'url'        => $_SERVER['REQUEST_URI'] ?? null
            ]);

            return false;
        }
        /*
        * Nombre de tentatives atteint :
        * création du bannissement
        */
        $this->manualBan(
            $duration,
            $ip,
            null,
            $reason
        );
        return true;
    }

    public function permanentBan(?string $ip = null, ?string $author = null, string $reason = 'Bannissement définitif'): ?string
    {
        $ban = $this->getBanByIp($ip);

        if ($ban !== null) {
            return $this->updatePermanentBan(
                $ban,
                $reason
            );
        }

        return $this->createPermanentBan(
            $ip,
            $author,
            $reason
        );
    }

    private function createPermanentBan(?string $ip, ?string $author, string $reason): ?string
    {
        $banId = $this->generateBanId();

        $data = [
            'ban_id'       => $banId,
            'ip'           => $ip,
            'author'       => $author,
            'number'       => 0,
            'reason'       => $reason,
            'created_at'   => date('Y-m-d H:i:s'),
            'last_attempt' => date('Y-m-d H:i:s'),
            'expires_at'   => null,
            'attempts'     => 1,
            'user_agent'   => $_SERVER['HTTP_USER_AGENT'] ?? null,
            'active'       => 1
        ];

        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT');
        $sql->insert($data);

        if (!$sql->data) {
            return null;
        }

        $data['action'] = 'PERMANENT_BAN';

        $this->banishmentLogs($data);

        return $banId;
    }

    private function updatePermanentBan(array $ban, string $reason): ?string
    {
        $data = [
            'number'       => 0,
            'reason'       => $reason,
            'last_attempt' => date('Y-m-d H:i:s'),
            'expires_at'   => null,
            'active'       => 1
        ];

        $sql = new BDD();
        $sql->table('TABLE_BANISHMENT');

        $sql->where('WHERE `ban_id` = "'.$ban['ban_id'].'"');

        $sql->update($data);

        if (!$sql->data) {
            return null;
        }

        $log = array_merge($ban, $data);
        $log['action'] = 'PERMANENT_UPDATE';

        $this->banishmentLogs($log);

        return $ban['ban_id'];
    }
}
