<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$hero = getHeroData();
$welcomeText = getWelcomeText();
$services = getServicesPreview(3);
$testimonials = getTestimonials();
?>

<main>
  <header class="hero"
    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo sanitizeOutput($hero['image']); ?>');">
    <div class="hero-content">
      <h1><?php echo sanitizeOutput($hero['title']); ?></h1>
      <p><?php echo sanitizeOutput($hero['subtitle']); ?></p>
      <a href="services.php" class="btn-primary"><?php echo sanitizeOutput($hero['button_text']); ?></a>
    </div>
  </header>

  <section class="welcome">
    <div class="container">
      <h2>Willkommen in meiner Werkstatt</h2>
      <p class="welcome-text"><?php echo sanitizeOutput($welcomeText); ?></p>
      <div class="signature">– <?php echo sanitizeOutput($contact['name']); ?> –</div>
    </div>
  </section>

  <section class="services-preview">
    <div class="container">
      <h2>Meine Leistungen</h2>
      <div class="service-grid">
        <?php foreach($services as $service): ?>
        <div class="service-card">
          <div class="service-icon"><?php echo $service['icon']; ?></div>
          <h3><?php echo sanitizeOutput($service['name']); ?></h3>
          <p><?php echo sanitizeOutput($service['description']); ?></p>
          <div class="service-meta">
            <span class="price"><?php echo sanitizeOutput($service['price']); ?></span>
            <span class="duration">⏱ <?php echo sanitizeOutput($service['duration']); ?></span>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="text-center">
        <a href="services.php" class="btn-secondary">Alle Dienstleistungen ansehen →</a>
      </div>
    </div>
  </section>

  <section class="testimonials">
    <div class="container">
      <h2>Was meine Kunden sagen</h2>
      <div class="testimonial-grid">
        <?php foreach($testimonials as $t): ?>
        <div class="testimonial-card">
          <div class="stars">
            <?php echo str_repeat('★', $t['rating']) . str_repeat('☆', 5 - $t['rating']); ?>
          </div>
          <p class="quote">„<?php echo sanitizeOutput($t['quote']); ?>“</p>
          <p class="customer">
            <strong><?php echo sanitizeOutput($t['name']); ?></strong><br>
            <small><?php echo sanitizeOutput($t['instrument']); ?></small>
          </p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>