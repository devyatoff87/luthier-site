<?php
session_start();

$action = $_GET['action'] ?? 'dashboard';

if ($action !== 'login' && !isset($_SESSION['admin_logged_in'])) {
    header('Location: ?action=login');
    exit;
}

require_once __DIR__ . '/../includes/data.php';

switch ($action) {
    case 'login':
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'] ?? '';
            $storedPassword = 'admin123';
            if ($password === $storedPassword) {
                $_SESSION['admin_logged_in'] = true;
                header('Location: index.php');
                exit;
            } else {
                $error = 'Falsches Passwort!';
            }
        }
        include __DIR__ . '/templates/login.php';
        break;

    case 'logout':
        session_destroy();
        header('Location: ?action=login');
        exit;

    case 'edit':
        $section = $_GET['section'] ?? 'hero';
        $data = loadJson($section);
        if (!is_array($data)) $data = [];

        $success = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
            if ($section === 'services' && isset($_POST['services'])) {
                $newData = [];
                foreach ($_POST['services'] as $service) {
                    if (!empty($service['name'])) {
                        $newData[] = [
                            'name' => $service['name'],
                            'description' => parseDescription($service['description'] ?? ''),
                            'price' => $service['price'] ?? '',
                            'duration' => $service['duration'] ?? '',
                            'image' => $service['image'] ?? ''
                        ];
                    }
                }
                saveJson($section, $newData);
                $success = "Dienstleistungen wurden gespeichert!";
                $data = loadJson($section);
                if (!is_array($data)) $data = [];
            } else {
                $newData = [];
                if (isset($_POST['data']) && is_array($_POST['data'])) {
                    foreach ($_POST['data'] as $key => $value) {
                        $decoded = json_decode($value, true);
                        $newData[$key] = ($decoded !== null) ? $decoded : $value;
                    }
                }
                saveJson($section, $newData);
                $success = "Daten wurden gespeichert!";
                $data = loadJson($section);
                if (!is_array($data)) $data = [];
            }
        }

        $title = ucfirst($section) . ' bearbeiten';
        include __DIR__ . '/templates/header.php';
        include __DIR__ . '/templates/edit.php';
        include __DIR__ . '/templates/footer.php';
        break;

    default:
        $title = 'Dashboard';
        include __DIR__ . '/templates/header.php';
        include __DIR__ . '/templates/dashboard.php';
        include __DIR__ . '/templates/footer.php';
        break;
}
?>