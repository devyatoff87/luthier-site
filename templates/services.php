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
          <p><?= sanitizeOutput($service['description']) ?></p>
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