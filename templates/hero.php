<?php
/**
 * @var array $hero
 */
?>
<header class="hero"
  style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= sanitizeOutput($hero['image'] ?? '') ?>');">
  <div class="hero-content">
    <h1><?= sanitizeOutput($hero['title'] ?? '') ?></h1>
    <p><?= sanitizeOutput($hero['subtitle'] ?? '') ?></p>
    <a href="services.php" class="btn-primary"><?= sanitizeOutput($hero['button_text'] ?? 'Mehr erfahren') ?></a>
  </div>
</header>