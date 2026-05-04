<?php
/**
 * @var string $title
 * @var string $subtitle (optional)
 */
?>
<section class="page-header">
  <div class="container">
    <h1><?= sanitizeOutput($title) ?></h1>
    <?php if (!empty($subtitle)): ?>
    <p><?= sanitizeOutput($subtitle) ?></p>
    <?php endif; ?>
  </div>
</section>