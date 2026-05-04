<?php
$route = $_GET['route'] ?? $_GET['page'] ?? 'home';
if ($route === '' || $route === '/') $route = 'home';

$allowedRoutes = ['home', 'services', 'gallery', 'contact', 'impressum'];

if (in_array($route, $allowedRoutes)) {
    include __DIR__ . "/routes/{$route}.php";
} else {
    http_response_code(404);
    include __DIR__ . "/routes/404.php";
}