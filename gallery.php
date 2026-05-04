<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$gallery = getGallery();
$categories = getGalleryCategories();
?>

<main>
  <section class="page-header">
    <div class="container">
      <h1>Galerie</h1>
      <p>Einblicke in meine Arbeit – vergangene Projekte und aktuelle Aufträge</p>
    </div>
  </section>

  <section class="gallery-section">
    <div class="container">
      <div class="gallery-filters">
        <button class="filter-btn active" data-filter="all">Alle</button>
        <?php foreach($categories as $category): ?>
        <button class="filter-btn" data-filter="<?php echo sanitizeOutput($category); ?>">
          <?php echo sanitizeOutput($category); ?>
        </button>
        <?php endforeach; ?>
      </div>

      <div class="gallery-grid">
        <?php foreach($gallery as $item): ?>
        <div class="gallery-item" data-category="<?php echo sanitizeOutput($item['category']); ?>">
          <img src="<?php echo sanitizeOutput($item['image']); ?>" alt="<?php echo sanitizeOutput($item['title']); ?>"
            loading="lazy">
          <div class="gallery-overlay">
            <h3><?php echo sanitizeOutput($item['title']); ?></h3>
            <p><?php echo sanitizeOutput($item['category']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>