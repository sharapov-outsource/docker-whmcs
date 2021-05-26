<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 24.05.2021
 * Time: 22:49
 */

if (!defined("WHMCS")) {
  die("This file cannot be accessed directly");
}

function hook_ForceEveryoneToLogin($vars) {
  if($vars['templatefile'] != 'homepage') {
    $clientID = intval($_SESSION['uid']);
    if($vars['templatefile'] != "login"
      && $vars['templatefile'] != "dologin"
      && $vars['templatefile'] != "clientregister"
      && $vars['templatefile'] != "contact"
      && $vars['templatefile'] != 'password-reset-container'
      && $vars['templatefile'] != "clientarea"
      && $clientID === 0)
    {
      header("Location: clientarea.php");
      exit;
    }
  }
}

add_hook("ClientAreaPage", 1, "hook_ForceEveryoneToLogin");
