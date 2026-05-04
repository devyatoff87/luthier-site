<?php
/**
 * @var array $contact
 * @var array $csrf_token
 */
?><section class="contact-section">
  <div class="container">
    <div class="contact-wrapper">
      <?php template('contact-info', ['contact' => $contact]); ?>
      <?php template('contact-form', ['csrf_token' => $csrf_token]); ?>
    </div>
  </div>
</section>