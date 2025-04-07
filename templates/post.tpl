<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$post.title}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>{$post.title}</h1>
        <p><small>Írta: {$author.id} - Publikálva: {$post.publish_at}</small></p>
        <div class="content">
            <p>{$post.content}</p>
        </div>
        <a href="index.php" class="btn btn-secondary">Vissza a főoldalra</a>
    </div>
</body>
</html>
