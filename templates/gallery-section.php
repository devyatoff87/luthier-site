<?php
/**
 * @var array $categories
 * @var array $gallery
 */
?>
<section class="gallery-section">
  <div class="container">
    <?php template('gallery-filters', ['categories' => $categories]); ?>
    <?php template('gallery-grid', ['gallery' => $gallery]); ?>
  </div>
</section>