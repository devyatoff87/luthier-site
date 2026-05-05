<?php
session_start();

$action = $_GET['action'] ?? 'dashboard';

// Login-Prüfung
if ($action !== 'login' && !isset($_SESSION['admin_logged_in'])) {
    header('Location: ?action=login');
    exit;
}

require_once __DIR__ . '/../includes/data.php';

switch ($action) {
    case 'login':
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['password'] === 'admin123') {
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
        $success = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
            $newData = [];
            foreach ($_POST['data'] as $key => $value) {
                $decoded = json_decode($value, true);
                $newData[$key] = ($decoded !== null) ? $decoded : $value;
            }
            saveJson($section, $newData);
            $success = "Daten wurden gespeichert!";
            $data = loadJson($section);
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