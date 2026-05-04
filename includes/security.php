<?php
// security.php - Zentrale Sicherheitsfunktionen

// ========== SESSION SICHERHEIT ==========
function initSecureSession() {
    // Session-Cookie nur über HTTPS
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        ini_set('session.cookie_secure', 1);
    }

    // HttpOnly verhindert JavaScript-Zugriff
    ini_set('session.cookie_httponly', 1);

    // SameSite Strict (schützt vor CSRF)
    ini_set('session.cookie_samesite', 'Strict');

    // Session-ID neu generieren bei Login
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id(true);
        $_SESSION['initiated'] = true;
    }
}

// ========== XSS SCHUTZ ==========
function sanitizeOutput($data) {
    if (is_array($data)) {
        return array_map('sanitizeOutput', $data);
    }
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// ========== CSRF SCHUTZ ==========
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        die('CSRF Token ungültig!');
    }
    return true;
}

// ========== INPUT VALIDIERUNG ==========
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateString($input, $min = 1, $max = 1000) {
    $input = trim($input);
    $length = strlen($input);
    return $length >= $min && $length <= $max;
}

// ========== RATE LIMITING (Login schützen) ==========
function checkRateLimit($key, $maxAttempts = 5, $timeout = 900) {
    $filename = sys_get_temp_dir() . '/rate_limit_' . md5($key);

    if (file_exists($filename)) {
        $data = json_decode(file_get_contents($filename), true);

        if ($data['attempts'] >= $maxAttempts) {
            $timePassed = time() - $data['first_attempt'];
            if ($timePassed < $timeout) {
                return false; // Geblockt
            } else {
                // Timeout erreicht, zurücksetzen
                unlink($filename);
            }
        }
    }
    return true; // Erlaubt
}

function incrementRateLimit($key) {
    $filename = sys_get_temp_dir() . '/rate_limit_' . md5($key);

    if (file_exists($filename)) {
        $data = json_decode(file_get_contents($filename), true);
        $data['attempts']++;
    } else {
        $data = [
            'first_attempt' => time(),
            'attempts' => 1
        ];
    }

    file_put_contents($filename, json_encode($data));
}

// ========== VERZEICHNIS SCHUTZ ==========
function protectDirectory($directory) {
    $htaccess = $directory . '.htaccess';
    $content = "Order Deny,Allow\nDeny from all";

    if (!file_exists($htaccess)) {
        file_put_contents($htaccess, $content);
    }
}

// ========== SECURE REDIRECT ==========
function secureRedirect($url) {
    // Nur lokale URLs erlauben (verhindert Open Redirect)
    $allowedHosts = [$_SERVER['HTTP_HOST'], 'localhost'];
    $parsed = parse_url($url);

    if (isset($parsed['host']) && !in_array($parsed['host'], $allowedHosts)) {
        die('Unerlaubte Weiterleitung');
    }

    header('Location: ' . $url);
    exit();
}

// ========== UPLOAD SICHERHEIT ==========
function validateImageUpload($file, $maxSize = 5242880) { // 5MB
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    if ($file['size'] > $maxSize) {
        return false;
    }

    if (!in_array($file['type'], $allowedTypes)) {
        return false;
    }

    // Prüfen ob es wirklich ein Bild ist
    if (!getimagesize($file['tmp_name'])) {
        return false;
    }

    return true;
}

// ========== SQL INJECTION SCHUTZ (für später mit DB) ==========
function sanitizeInput($input) {
    if (is_array($input)) {
        return array_map('sanitizeInput', $input);
    }
    return trim(htmlspecialchars(strip_tags($input)));
}

// ========== LOGGING ==========
function logSecurityEvent($event, $details = '') {
    $logFile = __DIR__ . '/../logs/security.log';
    $logDir = dirname($logFile);

    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }

    $entry = date('Y-m-d H:i:s') . ' | ' . $_SERVER['REMOTE_ADDR'] . ' | ' . $event . ' | ' . $details . PHP_EOL;
    file_put_contents($logFile, $entry, FILE_APPEND);
}
?>