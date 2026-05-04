<?php
$csrf_token = generateCSRFToken();
include __DIR__ . '/../includes/header.php';

template('page-header', [
    'title' => 'Kontakt',
    'subtitle' => 'Ich freue mich auf deine Nachricht'
]);
template('contact-wrapper', [
    'contact' => getContact(),
    'csrf_token' => $csrf_token
]);

include __DIR__ . '/../includes/footer.php';