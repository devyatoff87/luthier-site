<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$contactData = getContact();
?>

<main>
  <section class="page-header">
    <div class="container">
      <h1>Impressum</h1>
    </div>
  </section>

  <section class="container" style="padding: 2rem 0 4rem;">
    <h2>Angaben gemäß § 5 TMG</h2>
    <p>
      <?php echo sanitizeOutput($contactData['name']); ?><br>
      <?php echo sanitizeOutput($contactData['address']); ?>
    </p>

    <h3 style="margin-top: 1.5rem;">Kontakt</h3>
    <p>
      Telefon: <?php echo sanitizeOutput($contactData['phone']); ?><br>
      E-Mail: <?php echo sanitizeOutput($contactData['email']); ?>
    </p>

    <h3 style="margin-top: 1.5rem;">Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV</h3>
    <p><?php echo sanitizeOutput($contactData['name']); ?>, Anschrift wie oben</p>

    <h3 style="margin-top: 1.5rem;">EU-Streitschlichtung</h3>
    <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: <a
        href="https://ec.europa.eu/consumers/odr/" target="_blank">https://ec.europa.eu/consumers/odr/</a></p>
  </section>
</main>

<?php include 'includes/footer.php'; ?>