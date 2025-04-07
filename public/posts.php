<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Post;

session_start();

// Ha nincs bejelentkezve az admin, átirányítjuk a bejelentkező oldalra
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=rackforest', 'root', '');
$postModel = new Post($pdo);

$posts = $postModel->getAll();
?>

<h2>Blog posztok listája</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cím</th>
            <th>Publikálás dátuma</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= htmlspecialchars($post['id']) ?></td>
                <td><?= htmlspecialchars($post['title']) ?></td>
                <td><?= htmlspecialchars($post['publish_at']) ?></td>
                <td>
                    <a href="/admin/edit_post.php?id=<?= $post['id'] ?>">Szerkesztés</a>
                    <a href="/admin/delete_post.php?id=<?= $post['id'] ?>">Törlés</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once 'back_button.php'; ?>
