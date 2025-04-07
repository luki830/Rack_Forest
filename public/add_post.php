<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Post;
use App\Models\User;

session_start();

// Ha nincs bejelentkezve az admin, átirányítjuk a bejelentkező oldalra
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=rackforest', 'root', '');
$postModel = new Post($pdo);

// Ha posztot küldtek be
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; // Admin ID
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish_at = $_POST['publish_at']; // Dátum a poszt publikálásához

    // Új poszt hozzáadása
    if ($postModel->create($user_id, $title, $content, $publish_at)) {
        echo "Poszt sikeresen hozzáadva!";
    } else {
        echo "Hiba történt a poszt hozzáadása során!";
    }
}
?>

<form method="POST">
    <label for="title">Cím:</label>
    <input type="text" name="title" id="title" required>

    <label for="content">Tartalom:</label>
    <textarea name="content" id="content" required></textarea>

    <label for="publish_at">Publikálás dátuma:</label>
    <input type="datetime-local" name="publish_at" id="publish_at" required>

    <button type="submit">Poszt hozzáadása</button>
    <?php require_once 'back_button.php'; ?>
</form>
