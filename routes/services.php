<?php
include 'includes/header.php';

template('page-header', [
    'title' => 'Meine Dienstleistungen',
    'subtitle' => 'Von der Hand eines Meisters – fair, transparent und mit Liebe zum Detail'
]);
template('services-full', ['services' => getServices()]);
template('cta-section', []);

include 'includes/footer.php';