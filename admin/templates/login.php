<?php
session_start();
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password'] === ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Falsches Passwort!';
    }
}
?>

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
    <?php if (isset($error)) echo "<div class='alert error'>$error</div>"; ?>
    <form method="POST">
      <input type="password" name="password" placeholder="Passwort" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>

</html>