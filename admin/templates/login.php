<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="admin-login-body">
  <div class="login-container">
    <h1>Admin Login</h1>

    <?php if (isset($error) && $error): ?>
    <div class="alert error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
      <input type="password" name="password" placeholder="Passwort" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>

</html>