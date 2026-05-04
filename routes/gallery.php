<?php
include 'includes/header.php';

template('page-header', [
    'title' => 'Galerie',
    'subtitle' => 'Einblicke in meine Arbeit – vergangene Projekte und aktuelle Aufträge'
]);
template('gallery-filters', ['categories' => getGalleryCategories()]);
template('gallery-grid', ['gallery' => getGallery()]);

include 'includes/footer.php';