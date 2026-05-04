<?php
/**
 * @var array $gallery
 */
?>
<div class="gallery-grid">
  <?php foreach ($gallery as $item): ?>
  <div class="gallery-item" data-category="<?= sanitizeOutput($item['category']) ?>">
    <img src="<?= sanitizeOutput($item['image']) ?>" alt="<?= sanitizeOutput($item['title']) ?>" loading="lazy">
    <div class="gallery-overlay">
      <h3><?= sanitizeOutput($item['title']) ?></h3>
      <p><?= sanitizeOutput($item['category']) ?></p>
    </div>
  </div>
  <?php endforeach; ?>
</div>