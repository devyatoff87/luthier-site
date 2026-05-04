<?php
/**
 * @var array $gallery
 */
?>
<div class="gallery-grid">
  <?php if (count($gallery) > 0): ?>
  <?php foreach ($gallery as $item): ?>
  <div class="gallery-item" data-category="<?= htmlspecialchars($item['category']) ?>">
    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" loading="lazy">
    <div class="gallery-overlay">
      <h3><?= htmlspecialchars($item['title']) ?></h3>
      <p><?= htmlspecialchars($item['category']) ?></p>
    </div>
  </div>
  <?php endforeach; ?>
  <?php else: ?>
  <div class="no-images">
    <p>Keine Bilder gefunden. Bitte lege Bilder in /images/gallery/ ab.</p>
  </div>
  <?php endif; ?>
</div>