<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - <?= htmlspecialchars($title ?? 'CMS') ?></title>
  <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
  <div class="admin-wrapper">
    <nav class="admin-nav">
      <div class="admin-nav-brand">⚙️ Luthier CMS</div>
      <div class="admin-nav-links">
        <a href="index.php">Dashboard</a>
        <a href="?action=logout">Logout</a>
      </div>
    </nav>
    <main class="admin-main">