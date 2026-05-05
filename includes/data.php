<?php
function loadJson($file) {
    $path = __DIR__ . "/../data/{$file}.json";
    if (!file_exists($path)) {
        return [];
    }
    $content = file_get_contents($path);
    $data = json_decode($content, true);
    return is_array($data) ? $data : [];
}

function saveJson($file, $data) {
    $path = __DIR__ . "/../data/{$file}.json";
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

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
?>