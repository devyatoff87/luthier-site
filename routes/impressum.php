<?php
include 'includes/header.php';

template('page-header', ['title' => 'Impressum', 'subtitle' => '']);
template('impressum-content', ['contact' => getContact()]);

include 'includes/footer.php';