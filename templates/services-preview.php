<?php
/**
 * @var array $services
 */
?>
<section class="services-preview">
  <div class="container">
    <h2>Meine Leistungen</h2>
    <div class="service-grid">
      <?php foreach ($services as $service): ?>
      <div class="service-card">
        <div class="service-icon"><?= $service['icon'] ?></div>
        <h3><?= sanitizeOutput($service['name']) ?></h3>
        <p><?= sanitizeOutput($service['description']) ?></p>
        <div class="service-meta">
          <span class="price"><?= sanitizeOutput($service['price']) ?></span>
          <span class="duration">⏱ <?= sanitizeOutput($service['duration']) ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center">
      <a href="services.php" class="btn-secondary">Alle Dienstleistungen ansehen →</a>
    </div>
  </div>
</section>