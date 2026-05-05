<?php
/**
 * @var array $services
 */
?>
<section class="services-full">
  <div class="container">
    <div class="services-grid-full">
      <?php foreach ($services as $service): ?>
      <div class="service-item-full">
        <div class="service-icon-large"><?= $service['icon'] ?></div>
        <div class="service-info">
          <h3><?= sanitizeOutput($service['name']) ?></h3>

          <?php
                    $description = $service['description'] ?? '';
                    $lines = [];

                    if (is_array($description)) {
                        $lines = $description;
                    } elseif (is_string($description)) {
                        $lines = explode("\n", trim($description));
                        $lines = array_filter(array_map('trim', $lines));
                    }

                    if (!empty($lines)):
                    ?>
          <ul>
            <?php foreach ($lines as $line): ?>
            <li><?= sanitizeOutput($line) ?></li>
            <?php endforeach; ?>
          </ul>
          <?php else: ?>
          <p><?= sanitizeOutput($description) ?></p>
          <?php endif; ?>

          <div class="service-details">
            <span class="price-tag">💰 <?= sanitizeOutput($service['price']) ?></span>
            <span class="duration-tag">⏱ <?= sanitizeOutput($service['duration']) ?></span>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>