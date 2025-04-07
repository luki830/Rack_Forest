<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Post;
use App\Models\User;

session_start();

// Csatlakozás az adatbázishoz
$pdo = new PDO('mysql:host=localhost;dbname=rackforest', 'root', '');
$postModel = new Post($pdo);
$userModel = new User($pdo);

// Posztok lekérése
$posts = $postModel->getAll();
$posts = $postModel->getPublishedPosts(); 
foreach ($posts as &$post) {
    $author = $userModel->findById($post['user_id']);
    $post['author'] = $author['email'] ?? 'Ismeretlen';
}

$smarty = new  \Smarty\Smarty();

$smarty->setTemplateDir(__DIR__ . '/../templates');
$smarty->setCompileDir(__DIR__ . '/../templates_c');

// Beállítjuk a Smarty változókat
$smarty->assign('posts', $posts);

if (isset($_SESSION['user_id'])) {
    $user = $userModel->findById($_SESSION['user_id']);
    $smarty->assign('user', $user);
}

// A főoldal sablon betöltése
$smarty->display('index.tpl');
?>
