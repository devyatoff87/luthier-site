<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<main>
  <?php template('page-header', [
        'title' => 'Kontakt',
        'subtitle' => 'Ich freue mich auf deine Nachricht'
    ]); ?>

  <section class="contact-section">
    <div class="container">
      <div class="contact-wrapper">
        <?php template('contact-info', ['contact' => getContact()]); ?>
        <?php template('contact-form', ['csrf_token' => $csrf_token]); ?>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>