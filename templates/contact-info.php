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
      <p><?= $contact['address'] ?></p>
    </div>
  </div>
  <div class="info-item">
    <span class="info-icon">📞</span>
    <div>
      <strong>Telefon</strong>
      <p><?= $contact['phone'] ?></p>
    </div>
  </div>
  <div class="info-item">
    <span class="info-icon">✉️</span>
    <div>
      <strong>E-Mail</strong>
      <p><?= $contact['email'] ?></p>
    </div>
  </div>
  <div class="info-item">
    <span class="info-icon">🕐</span>
    <div>
      <strong>Öffnungszeiten</strong>
      <p><?= $contact['hours'] ?></p>
    </div>
  </div>
</div>