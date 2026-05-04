<?php
function getGallery() {
    $dir = __DIR__ . '/../images/gallery/';
    $result = [];

    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        return [];
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $files = scandir($dir);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($extension, $allowedExtensions)) {
            $result[] = [
                'image' => 'images/gallery/' . $file,
                'title' => ucfirst(str_replace(['_', '-'], ' ', pathinfo($file, PATHINFO_FILENAME))),
                'category' => 'Galerie'
            ];
        }
    }

    return $result;
}

function getGalleryCategories() {
    return ['Galerie'];
}