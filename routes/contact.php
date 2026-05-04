<?php
$csrf_token = generateCSRFToken();
include 'includes/header.php';

template('page-header', [
    'title' => 'Kontakt',
    'subtitle' => 'Ich freue mich auf deine Nachricht'
]);
template('contact-info', ['contact' => getContact()]);
template('contact-form', ['csrf_token' => $csrf_token]);

include 'includes/footer.php';