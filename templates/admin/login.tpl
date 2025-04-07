<html>
<head>
  <title>Bejelentkezés</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
  <h2>Admin bejelentkezés</h2>

  {if $error}
    <div class="alert alert-danger">{$error}</div>
  {/if}

  <form method="post">
    <div class="mb-3">
      <label>Email cím:</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Jelszó:</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Belépés</button>
  </form>
</body>
</html>