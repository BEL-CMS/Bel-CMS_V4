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
use BelCMS\Core\extendsPages;
use BelCMS\PDO\BDD;
use BelCMS\Requires\Common;

if (!defined('CHECK_INDEX')):
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
    exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class Forum extends extendsPages
{
    var $useModels = 'ModelsForum',
        $dir       = 'forum';

    public function index ()
    {
        $_SESSION['description'] = 'Forum';
        $a['forum'] = $this->models->getForum();
        $this->set($a);
        $this->render('index');
    }

    public function threads()
    {
        $_SESSION['description'] = 'Messages';
        $id        = (int) $this->data[2];
        $s['post'] = $this->models->threads($id);
        $this->set($s);
        $this->render('threads');
    }

    public function message()
    {
        if (ctype_alnum($this->data[2])) {
            if (strlen($this->data[2]) == 16) {
                $id = $this->data[2];
                $a['title'] = $this->models->getNameMsg($id);
                $a['msg'] = $this->models->getMessages ($id);
                $this->set($a);
                $this->render('message');
            } else {
                /* error */
            }
        }
    }
    #####################################
    # Récupère le compte des message emis
    #####################################
    public static function countMsg($hash_key)
    {
        $sql = new BDD;
        $sql->table('TABLE_FORUM_MSG');
        $sql->where(array('name' => 'author', 'value' => $hash_key));
        $sql->count();
        $return = $sql->data;
        return $return;
    }

    public function reply ()
    {
        if (ctype_alnum($this->data[2])) {
            if (strlen($this->data[2]) == 16) {
                $a['code'] = $this->data[2];
                $this->set($a);
                $this->render('reply');
            } else {
                $this->notification('error', 'Le code ne correspond pas à 16 caractères <br/>Administrateur prévenue', constant('ID_ERROR'), false);
                return false;
            }
        } else {
            $this->notification('error', 'Le code n\'est pas un numeric ! <br/>Administrateur prévenue', constant('ID_ERROR'), false);
            return false;
        }
    }

    public function forum_send_reply()
    {
        $code = $_POST['code'];
        if (ctype_alnum($code)) {
            if (strlen($code) == 16) {
                if ($_FILES['files']['error'] != 4) {
                    $screen = Common::Upload('files', 'uploads/forum', false, true);
                    $array['files'] = '/uploads/forum/' . $screen;
                }
                $array['content'] = Common::VarSecure($_POST['content'], 'html');
                $array['id_mdg']  = $code;
                $array['author']  = $_SESSION['USER']->user->hash_key;
                $this->models->sendReply ($array);
                $this->notification('success', 'La réponse a bien et émit.', 'Forum', false);
            } else {
                $this->notification('error', 'Le code ne correspond pas à 16 caractères <br/>Administrateur prévenue !', constant('ID_ERROR'), false);
                return false;
            }
        } else {
            $this->notification('error', 'Le code n\'est pas un numeric ! <br/>Administrateur prévenue !', constant('ID_ERROR'), false);
            return false;
        }
        $this->redirect('Forum/Message/'.$code.'', 1);
    }
}