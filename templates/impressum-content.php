<?php
/**
 * @var array $contact
 */
?>
<section class="container" style="padding: 2rem 0 4rem;">
  <h2>Angaben gemäß § 5 TMG</h2>
  <p><?= sanitizeOutput($contact['name']) ?><br><?= sanitizeOutput($contact['address']) ?></p>
  <h3>Kontakt</h3>
  <p>Telefon: <?= sanitizeOutput($contact['phone']) ?><br>E-Mail: <?= sanitizeOutput($contact['email']) ?></p>
  <h3>Verantwortlich für den Inhalt</h3>
  <p><?= sanitizeOutput($contact['name']) ?>, Anschrift wie oben</p>
  <h3>EU-Streitschlichtung</h3>
  <p>OS-Plattform: <a href="https://ec.europa.eu/consumers/odr/" target="_blank">ec.europa.eu/consumers/odr/</a></p>
</section>