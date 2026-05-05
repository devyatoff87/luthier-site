<?php
// config.php - Sensible Daten (nicht im Git!)

// Admin Passwort (ändern!)
define('ADMIN_PASSWORD', 'admin123');

// CSRF Salt (für zusätzliche Sicherheit)
define('CSRF_SALT', 'dein-zufaelliger-string-123456789');

// Weitere sensible Daten
define('SITE_NAME', 'Luthier Werkstatt');
define('ADMIN_EMAIL', 'admin@luthier-werkstatt.de');

// Rate Limiting Einstellungen
define('RATE_LIMIT_ATTEMPTS', 5);
define('RATE_LIMIT_TIMEOUT', 900); // 15 Minuten

// Upload Einstellungen
define('MAX_UPLOAD_SIZE', 5242880); // 5MB
?>