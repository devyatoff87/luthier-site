<?php
$contact = getContact();
include 'includes/header.php';

template('hero', ['hero' => getHeroData()]);
template('welcome', [
    'welcomeText' => getWelcomeText(),
    'contactName' => $contact['name']
]);
template('services-preview', ['services' => getServicesPreview(3)]);
template('testimonials', ['testimonials' => getTestimonials()]);

include 'includes/footer.php';