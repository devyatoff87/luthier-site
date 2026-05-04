<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$contactData = getContact();
?>

<main>
  <section class="page-header">
    <div class="container">
      <h1>Kontakt</h1>
      <p>Ich freue mich auf deine Nachricht</p>
    </div>
  </section>

  <section class="contact-section">
    <div class="container">
      <div class="contact-wrapper">
        <div class="contact-info">
          <h2>So erreichst du mich</h2>
          <div class="info-item">
            <span class="info-icon">📍</span>
            <div>
              <strong>Adresse</strong>
              <p><?php echo sanitizeOutput($contactData['address']); ?></p>
            </div>
          </div>
          <div class="info-item">
            <span class="info-icon">📞</span>
            <div>
              <strong>Telefon</strong>
              <p><?php echo sanitizeOutput($contactData['phone']); ?></p>
            </div>
          </div>
          <div class="info-item">
            <span class="info-icon">✉️</span>
            <div>
              <strong>E-Mail</strong>
              <p><?php echo sanitizeOutput($contactData['email']); ?></p>
            </div>
          </div>
          <div class="info-item">
            <span class="info-icon">🕐</span>
            <div>
              <strong>Öffnungszeiten</strong>
              <p><?php echo sanitizeOutput($contactData['hours']); ?></p>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <h2>Schreib mir eine Nachricht</h2>
          <form action="send.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <input type="text" name="name" placeholder="Dein Name" required>
            <input type="email" name="email" placeholder="Deine E-Mail" required>
            <input type="text" name="subject" placeholder="Betreff">
            <textarea name="message" rows="5" placeholder="Deine Nachricht..." required></textarea>
            <button type="submit" class="btn-primary">Nachricht senden</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>