<?php
require_once 'includes/security.php';
require_once 'includes/data.php';

$contact = getContact();

// CSRF prüfen
if (!isset($_POST['csrf_token']) || !verifyCSRFToken($_POST['csrf_token'])) {
    die('Sicherheitstoken ungültig.');
}

// Rate Limiting
$ip = $_SERVER['REMOTE_ADDR'];
if (!checkRateLimit($ip, 10, 3600)) {
    die('Zu viele Anfragen. Bitte warte eine Stunde.');
}

// Input validieren
$name = sanitizeInput($_POST['name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$subject = sanitizeInput($_POST['subject'] ?? 'Kontaktanfrage');
$message = sanitizeInput($_POST['message'] ?? '');

if (!validateString($name, 2, 100)) {
    die('Ungültiger Name.');
}

if (!validateEmail($email)) {
    die('Ungültige E-Mail.');
}

if (!validateString($message, 10, 5000)) {
    die('Nachricht muss zwischen 10 und 5000 Zeichen lang sein.');
}

// E-Mail senden
$to = $contact['email'];
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$fullMessage = "Name: $name\n";
$fullMessage .= "E-Mail: $email\n";
$fullMessage .= "Nachricht:\n$message\n";

mail($to, $subject, $fullMessage, $headers);

// Rate Limit erhöhen
incrementRateLimit($ip);

// Erfolgsmeldung
secureRedirect('contact.php?success=1');
?>