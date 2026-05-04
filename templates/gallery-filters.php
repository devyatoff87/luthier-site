<?php
/**
 * @var array $categories
 */
?>
<div class="gallery-filters">
  <button class="filter-btn active" data-filter="all">Alle</button>
  <?php foreach ($categories as $category): ?>
  <?php if ($category !== 'Galerie'): ?>
  <button class="filter-btn" data-filter="<?= htmlspecialchars($category) ?>">
    <?= htmlspecialchars($category) ?>
  </button>
  <?php endif; ?>
  <?php endforeach; ?>
</div>