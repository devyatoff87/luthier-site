<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$services = getServices();
?>

<main>
  <section class="page-header">
    <div class="container">
      <h1>Meine Dienstleistungen</h1>
      <p>Von der Hand eines Meisters – fair, transparent und mit Liebe zum Detail</p>
    </div>
  </section>

  <section class="services-full">
    <div class="container">
      <div class="services-grid-full">
        <?php foreach($services as $service): ?>
        <div class="service-item-full">
          <div class="service-icon-large"><?php echo $service['icon']; ?></div>
          <div class="service-info">
            <h3><?php echo sanitizeOutput($service['name']); ?></h3>
            <p><?php echo sanitizeOutput($service['description']); ?></p>
            <div class="service-details">
              <span class="price-tag">💰 <?php echo sanitizeOutput($service['price']); ?></span>
              <span class="duration-tag">⏱ <?php echo sanitizeOutput($service['duration']); ?></span>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="container">
      <h2>Du hast ein besonderes Projekt?</h2>
      <p>Komm vorbei oder schreib mir – ich berate dich gerne!</p>
      <a href="contact.php" class="btn-primary">Kontakt aufnehmen</a>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>