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
    $user = $userModel->findById($userId);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($userModel->update($userId, $email, $password)) {
        echo "Felhasználó sikeresen módosítva!";
    } else {
        echo "Hiba történt a felhasználó módosítása során!";
    }
}
?>

<form method="POST">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    
    <label for="password">Jelszó:</label>
    <input type="password" name="password" id="password" required>
    
    <button type="submit">Módosítás</button>
    <?php require_once '../back_button.php'; ?>
</form>
