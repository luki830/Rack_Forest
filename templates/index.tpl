<!DOCTYPE html>
<html>
<head>
    <title>Főoldal - Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Blog</h1>
        
        <div>
            {if isset($user)}
                <a href="/logout.php" class="btn btn-danger">Kilépés</a>
                <a href="/add_post.php" class="btn btn-primary">Új blog írása</a>
                <a href="/admin/index.php" class="btn btn-info">Admin Menű</a> <!-- Admin Menű gomb -->
            {else}
                <a href="/login.php" class="btn btn-success">Belépés</a>
            {/if}
        </div>
    </div>

    {foreach $posts as $post}
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{$post.title}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{$post.created_at} - {$post.author}</h6>
                {assign var="short_content" value=$post.content|split:'\n'}
                <p class="card-text">{$short_content[0]}</p>
                <!--<p class="card-text">{$post.content|truncate:200}</p> -->
                <a href="post.php?id={$post.id}" class="btn btn-sm btn-outline-primary">Tovább olvasom</a>
            </div>
        </div>
    {/foreach}

</body>
</html>
