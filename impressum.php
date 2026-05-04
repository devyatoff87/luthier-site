<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<main>
  <?php template('page-header', ['title' => 'Impressum', 'subtitle' => '']); ?>

  <section class="container" style="padding: 2rem 0 4rem;">
    <?php $contactData = getContact(); ?>
    <h2>Angaben gemäß § 5 TMG</h2>
    <p><?= sanitizeOutput($contactData['name']) ?><br><?= sanitizeOutput($contactData['address']) ?></p>
    <h3>Kontakt</h3>
    <p>Telefon: <?= sanitizeOutput($contactData['phone']) ?><br>E-Mail: <?= sanitizeOutput($contactData['email']) ?></p>
    <h3>Verantwortlich für den Inhalt</h3>
    <p><?= sanitizeOutput($contactData['name']) ?>, Anschrift wie oben</p>
    <h3>EU-Streitschlichtung</h3>
    <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: <a
        href="https://ec.europa.eu/consumers/odr/" target="_blank">https://ec.europa.eu/consumers/odr/</a></p>
  </section>
</main>

<?php include 'includes/footer.php'; ?>