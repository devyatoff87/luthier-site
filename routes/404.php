<?php
$route = $_GET['route'] ?? $_GET['page'] ?? 'unknown';

template('page-header', [
    'title' => 'Seite nicht gefunden',
    'subtitle' => 'Die angeforderte Seite existiert nicht.'
]);
template('404-content', ['route' => $route]);

