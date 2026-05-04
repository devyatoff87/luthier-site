<?php
/**
 * @var string $route
 */
?>
<section class="container" style="padding: 2rem 0 4rem; text-align: center;">
  <p>Die Seite <strong><?= sanitizeOutput($route) ?></strong> wurde nicht gefunden.</p>
  <a href="?route=home" class="btn-primary">Zur Startseite</a>
</section>