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

        <?php
                $lines = explode("\n", trim($service['description']));
                if (count($lines) > 1):
                ?>
        <ul>
          <?php foreach (array_slice($lines, 0, 3) as $line): ?>
          <?php $line = trim($line); ?>
          <?php if (!empty($line)): ?>
          <li><?= sanitizeOutput($line) ?></li>
          <?php endif; ?>
          <?php endforeach; ?>
          <?php if (count($lines) > 3): ?>
          <li>...</li>
          <?php endif; ?>
        </ul>
        <?php else: ?>
        <p><?= sanitizeOutput($service['description']) ?></p>
        <?php endif; ?>

        <div class="service-meta">
          <span class="price"><?= sanitizeOutput($service['price']) ?></span>
          <span class="duration">⏱ <?= sanitizeOutput($service['duration']) ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center">
      <a href="?route=services" class="btn-secondary">Alle Dienstleistungen ansehen →</a>
    </div>
  </div>
</section>