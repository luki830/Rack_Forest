<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Post;
use App\Models\User;

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $pdo = new PDO('mysql:host=localhost;dbname=rackforest', 'root', '');
    $postModel = new Post($pdo);
    $userModel = new User($pdo);

    $post = $postModel->findById($postId);

    if ($post) {
        $author = $userModel->findById($post['user_id']);

        $smarty = new  \Smarty\Smarty();
        $smarty->assign('post', $post);
        $smarty->assign('author', $author);
        $smarty->setTemplateDir(__DIR__ . '/../templates');
        $smarty->display('post.tpl');
    } else {
        echo "A keresett poszt nem található!";
    }
}
?>
