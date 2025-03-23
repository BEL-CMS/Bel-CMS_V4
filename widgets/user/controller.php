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

namespace Belcms\Widgets\Controller\User;
use BelCMS\Core\extendsWidgets;

if (!defined('CHECK_INDEX')):
  header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
  exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

class User extends extendsWidgets
{
    public function index ($var)
    {
      $this->name  = $var->name;
      $this->title = $var->title;
      $this->pos   = $var->pos;
      $this->render();
    }
}