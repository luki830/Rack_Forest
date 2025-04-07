<?php

namespace App\Models;

use PDO;

class Post
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Blog poszt hozzáadása
    public function create($user_id, $title, $content, $publish_at)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (user_id, title, content, publish_at) VALUES (:user_id, :title, :content, :publish_at)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':publish_at', $publish_at);

        return $stmt->execute();
    }

    // Blog posztok listázása
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM posts ORDER BY publish_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Blog poszt módosítása
    public function update($id, $title, $content, $publish_at)
    {
        $stmt = $this->pdo->prepare("UPDATE posts SET title = :title, content = :content, publish_at = :publish_at WHERE id = :id");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':publish_at', $publish_at);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Blog poszt törlése
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Blog poszt keresése ID alapján
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPublishedPosts(): array
{
    $stmt = $this->pdo->prepare("
        SELECT * FROM posts 
        WHERE publish_at IS NOT NULL 
        AND publish_at <= NOW()
        ORDER BY publish_at DESC
    ");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
