<?php
// Aktuelle Seite ermitteln
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title ?? 'Luthier Werkstatt'; ?></title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <nav class="navbar">
    <div class="container">
      <div class="nav-brand">🎻 Luthier Werkstatt</div>
      <ul class="nav-menu">
        <li><a href="index.php" class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">Start</a></li>
        <li><a href="services.php"
            class="<?php echo $current_page == 'services.php' ? 'active' : ''; ?>">Dienstleistungen</a></li>
        <li><a href="gallery.php" class="<?php echo $current_page == 'gallery.php' ? 'active' : ''; ?>">Galerie</a></li>
        <li><a href="contact.php" class="<?php echo $current_page == 'contact.php' ? 'active' : ''; ?>">Kontakt</a></li>
      </ul>
      <div class="hamburger">☰</div>
    </div>
  </nav>