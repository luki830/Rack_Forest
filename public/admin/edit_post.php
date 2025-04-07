<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Post;

session_start();

// Ha nincs bejelentkezve az admin, átirányítjuk a bejelentkező oldalra
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=rackforest', 'root', '');
$postModel = new Post($pdo);

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $post = $postModel->findById($postId);
}

// Ha poszt módosítás történt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish_at = $_POST['publish_at'];

    if ($postModel->update($postId, $title, $content, $publish_at)) {
        echo "Poszt sikeresen módosítva!";
    } else {
        echo "Hiba történt a poszt módosítása során!";
    }
}
?>

<form method="POST">
    <label for="title">Cím:</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title']) ?>" required>

    <label for="content">Tartalom:</label>
    <textarea name="content" id="content" required><?= htmlspecialchars($post['content']) ?></textarea>

    <label for="publish_at">Publikálás dátuma:</label>
    <input type="datetime-local" name="publish_at" id="publish_at" value="<?= htmlspecialchars($post['publish_at']) ?>" required>

    <button type="submit">Módosítás</button>
    <?php require_once '../back_button.php'; ?>

</form>
