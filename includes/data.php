<?php
// Daten aus JSON-Dateien laden

function loadJson($file) {
    $path = __DIR__ . "/../data/{$file}.json";
    if (!file_exists($path)) {
        return [];
    }
    $content = file_get_contents($path);
    return json_decode($content, true);
}

function saveJson($file, $data) {
    $path = __DIR__ . "/../data/{$file}.json";
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// ========== GETTER-FUNKTIONEN ==========

function getHeroData() {
    return loadJson('hero');
}

function getWelcomeText() {
    $welcome = loadJson('welcome');
    return $welcome['text'] ?? '';
}

function getServices() {
    return loadJson('services');
}

function getServicesPreview($limit = 3) {
    return array_slice(getServices(), 0, $limit);
}

function getTestimonials() {
    return loadJson('testimonials');
}

function getContact() {
    return loadJson('contact');
}

// ========== Galerie-Funktionen (bleiben, falls benötigt) ==========
// getGallery() und getGalleryCategories() bleiben in gallery.php
?>