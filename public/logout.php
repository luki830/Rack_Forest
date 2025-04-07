<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Auth;

Auth::start();
Auth::logout();

header('Location: index.php');
exit;

?>