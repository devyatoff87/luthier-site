<?php
/**
 * @var array $contact
 */
?>
<div class="contact-info">
  <h2>So erreichst du mich</h2>
  <div class="info-item">
    <span class="info-icon">📍</span>
    <div>
      <strong>Adresse</strong>
      <p><?= sanitizeOutput($contact['address']) ?></p>
    </div>
  </div>
  <div class="info-item">
    <span class="info-icon">📞</span>
    <div>
      <strong>Telefon</strong>
      <p><?= sanitizeOutput($contact['phone']) ?></p>
    </div>
  </div>
  <div class="info-item">
    <span class="info-icon">✉️</span>
    <div>
      <strong>E-Mail</strong>
      <p><?= sanitizeOutput($contact['email']) ?></p>
    </div>
  </div>
  <div class="info-item">
    <span class="info-icon">🕐</span>
    <div>
      <strong>Öffnungszeiten</strong>
      <p><?= sanitizeOutput($contact['hours']) ?></p>
    </div>
  </div>
</div>