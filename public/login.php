<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Auth;
use App\Models\User;

$config = require __DIR__ . '/../config/config.php';

Auth::start();


$pdo = new PDO(
    "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset=utf8mb4",
    $config['db']['user'],
    $config['db']['pass']
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$smarty = new  \Smarty\Smarty();
$smarty->setTemplateDir(__DIR__ . '/../templates');
$smarty->setCompileDir(__DIR__ . '/../templates_c');

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userModel = new User($pdo);
    $user = $userModel->findByEmail($_POST['email']);
    
    if ($user && password_verify($_POST['password'], $user['password'])) 
    //if ($user && (strcmp($_POST['password'], $user['password'])== 0)) 
    {
        Auth::login($user);
        header('Location: /index.php');
        $_SESSION['user_id'] = $user['id'];
        exit;
    } else {
        $error = 'Hibás email vagy jelszó';
    }
}

$smarty->assign('error', $error);
$smarty->display('admin/login.tpl');
require_once 'back_button.php';

?>