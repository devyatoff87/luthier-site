<?php
/**
 * @var string $welcomeText
 * @var string $contactName
 */
?>
<section class="welcome">
  <div class="container">
    <h2>Willkommen in meiner Werkstatt</h2>
    <p class="welcome-text"><?= sanitizeOutput($welcomeText) ?></p>
    <div class="signature">– <?= sanitizeOutput($contactName) ?> –</div>
  </div>
</section>