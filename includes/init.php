<?php
// init.php - Zentrale Initialisierung + Sicherheit

// Fehler anzeigen (nur in Entwicklung)
if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    // Produktiv: Keine Fehler anzeigen
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Session starten
session_start();

// Sicherheitsfunktionen laden
require_once __DIR__ . '/security.php';

// Session-Sicherheit initialisieren
initSecureSession();

// Verzeichnisse schützen (einmalig ausführen)
protectDirectory(__DIR__ . '/../cms/');
protectDirectory(__DIR__ . '/../logs/');

// Basis-URL ermitteln
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
$baseDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

// Daten laden
require_once __DIR__ . '/data.php';

// CSRF Token für Forms generieren
 $contact = getContact();
$csrf_token = generateCSRFToken();

// Log Security Events (optional)
// logSecurityEvent('PAGE_ACCESS', basename($_SERVER['PHP_SELF']));
?>