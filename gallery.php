<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<main>
  <?php template('page-header', [
        'title' => 'Galerie',
        'subtitle' => 'Einblicke in meine Arbeit – vergangene Projekte und aktuelle Aufträge'
    ]); ?>

  <section class="gallery-section">
    <div class="container">
      <?php template('gallery-filters', ['categories' => getGalleryCategories()]); ?>
      <?php template('gallery-grid', ['gallery' => getGallery()]); ?>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>