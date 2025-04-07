<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\User;

session_start();

// Ha be van jelentkezve az admin
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=rackforest', 'root', '');
$userModel = new User($pdo);

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    if ($userModel->delete($userId)) {
        echo "Felhasználó sikeresen törölve!";
        header('Location: users.php');
        exit();
    } else {
        echo "Hiba történt a felhasználó törlése során!";
    }
}
?>
