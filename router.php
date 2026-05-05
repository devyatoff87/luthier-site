<?php
$route = $_GET['route'] ?? 'home';


switch ($route) {
    case 'services':
        include 'routes/services.php';
        break;
    case 'gallery':
        include 'routes/gallery.php';
        break;
    case 'contact':
        include 'routes/contact.php';
        break;
    case 'impressum':
        include 'routes/impressum.php';
        break;
    default:
        include 'routes/home.php';
        break;
}
