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
        <li><a href="?route=home">Start</a></li>
        <li><a href="?route=services">Dienstleistungen</a></li>
        <li><a href="?route=gallery">Galerie</a></li>
        <li><a href="?route=contact">Kontakt</a></li>
      </ul>
      <div class="hamburger">☰</div>
    </div>
  </nav>