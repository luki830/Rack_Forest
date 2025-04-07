<html>
<head>
  <title>Admin felület</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Üdv, {$user.email}!</h2>
    <a href="/logout.php" class="btn btn-danger">Kilépés</a>
    <a href="/index.php" class="btn btn-primary">Főoldal</a>
  </div>

  <div class="list-group">
    <a href="/admin/users.php" class="list-group-item list-group-item-action">Felhasználók kezelése</a>
    <a href="/posts.php" class="list-group-item list-group-item-action">Blogposztok kezelése</a>
  </div>

</body>
</html>