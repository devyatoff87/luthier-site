<?php
/**
 * @var array $categories
 */
?>
<div class="gallery-filters">
  <button class="filter-btn active" data-filter="all">Alle</button>
  <?php foreach ($categories as $category): ?>
  <button class="filter-btn" data-filter="<?= htmlspecialchars($category) ?>">
    <?= htmlspecialchars($category) ?>
  </button>
  <?php endforeach; ?>
</div>