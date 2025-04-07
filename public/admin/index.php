<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Core\Auth;

Auth::start();

if (!Auth::check()) {
    header('Location: /login.php');
    exit;
}

$smarty = new  \Smarty\Smarty();
$smarty->setTemplateDir(__DIR__ . '/../../templates');
$smarty->setCompileDir(__DIR__ . '/../../templates_c');

$user = Auth::user();

$smarty->assign('user', $user);
$smarty->display('admin/dashboard.tpl');
require_once '../back_button.php';

?>