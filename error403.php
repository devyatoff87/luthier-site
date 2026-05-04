<?php
require_once 'includes/init.php';
require_once 'includes/header.php';
require_once 'includes/data.php';
http_response_code(403);
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <title>403 - Zugriff verweigert</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body style="display: flex; align-items: center; justify-content: center; height: 100vh;">
  <div style="text-align: center;">
    <h1>403</h1>
    <p>Zugriff auf diese Ressource ist nicht erlaubt.</p>
    <a href="/" class="btn-primary">Zur Startseite</a>
  </div>
</body>

</html>