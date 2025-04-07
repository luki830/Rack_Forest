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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Felhasználó regisztrálása
    if ($userModel->create($email, $hashedPassword)) {
        echo "Felhasználó sikeresen regisztrálva!";
        header('Location: /../users.php');
        exit();
    } else {
        echo "Hiba történt a felhasználó regisztrálása során!";
    }
}
?>

<form method="POST">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required>
    
    <label for="password">Jelszó:</label>
    <input type="password" name="password" id="password" required>
    
    <button type="submit">Regisztrálás</button>
    <?php require_once '../back_button.php'; ?>
</form>
