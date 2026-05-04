<?php
/**
 * @var array $gallery
 */
?>
<div class="gallery-grid">
  <?php foreach ($gallery as $item): ?>
  <div class="gallery-item" data-category="<?= htmlspecialchars($item['category']) ?>">
    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" loading="lazy">
    <div class="gallery-overlay">
      <h3><?= htmlspecialchars($item['title']) ?></h3>
      <p><?= htmlspecialchars($item['category']) ?></p>
    </div>
  </div>
  <?php endforeach; ?>
</div>