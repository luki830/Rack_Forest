<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\User;

session_start();

// Ha be van jelentkezve az admin
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// PDO kapcsolat beállítása
$pdo = new PDO('mysql:host=localhost;dbname=rackforest', 'root', '');
$userModel = new User($pdo);

$users = $userModel->getAll();
?>

<h2>Felhasználók listája</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $user['id'] ?>">Szerkesztés</a>
                    <a href="delete_user.php?id=<?= $user['id'] ?>">Törlés</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once '../back_button.php'; ?>
