<?php
$route = $_GET['route'] ?? $_GET['page'] ?? 'unknown';
include 'includes/header.php';

template('page-header', [
    'title' => 'Seite nicht gefunden',
    'subtitle' => 'Die angeforderte Seite existiert nicht.'
]);
template('404-content', ['route' => $route]);

include 'includes/footer.php';