<?php
$csrf_token = generateCSRFToken();

template('page-header', [
    'title' => 'Kontakt',
    'subtitle' => 'Ich freue mich auf deine Nachricht'
]);
template('contact-wrapper', [
    'contact' => getContact(),
    'csrf_token' => $csrf_token
]);