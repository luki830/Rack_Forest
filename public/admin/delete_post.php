<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Post;

session_start();

// Ha nincs bejelentkezve az admin, átirányítjuk a bejelentkező oldalra
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
$postModel = new Post($pdo);

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    if ($postModel->delete($postId)) {
        echo "Poszt sikeresen törölve!";
    } else {
        echo "Hiba történt a poszt törlése során!";
    }
}
?>
