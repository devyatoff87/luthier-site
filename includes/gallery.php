<?php
function getGallery() {
    $dir = __DIR__ . '/../images/gallery/';
    $result = [];

    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        return [];
    }

    // Bilder aus Unterordnern (Kategorien)
    foreach (glob($dir . '*', GLOB_ONLYDIR) as $catDir) {
        $category = basename($catDir);
        foreach (glob($catDir . '/*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE) as $img) {
            $result[] = [
                'image' => 'images/gallery/' . $category . '/' . basename($img),
                'title' => ucfirst(str_replace(['_', '-'], ' ', pathinfo($img, PATHINFO_FILENAME))),
                'category' => $category
            ];
        }
    }

    // Bilder direkt im Hauptordner (ohne Kategorie)
    foreach (glob($dir . '*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE) as $img) {
        $result[] = [
            'image' => 'images/gallery/' . basename($img),
            'title' => ucfirst(str_replace(['_', '-'], ' ', pathinfo($img, PATHINFO_FILENAME))),
            'category' => 'Galerie'
        ];
    }

    return $result;
}

function getGalleryCategories() {
    $dir = __DIR__ . '/../images/gallery/';
    $categories = ['Galerie'];

    if (!is_dir($dir)) return $categories;

    foreach (glob($dir . '*', GLOB_ONLYDIR) as $catDir) {
        $categories[] = basename($catDir);
    }

    return $categories;
}