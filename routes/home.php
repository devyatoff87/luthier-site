<?php
$contact = getContact();
$hero = getHeroData();
$welcomeText = getWelcomeText();
$services = getServicesPreview(3);
$testimonials = getTestimonials();

?>

<main>
  <header class="hero"
    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?= $hero['image'] ?>');">
    <div class="hero-content">
      <h1><?= $hero['title'] ?></h1>
      <p><?= $hero['subtitle'] ?></p>
      <a href="?route=services" class="btn-primary"><?= $hero['button_text'] ?></a>
    </div>
  </header>

  <section class="welcome">
    <div class="container">
      <h2>Willkommen in meiner Werkstatt</h2>
      <p class="welcome-text"><?= $welcomeText ?></p>
      <div class="signature">– <?= $contact['name'] ?> –</div>
    </div>
  </section>

  <section class="services-preview">
    <div class="container">
      <h2>Meine Leistungen</h2>
      <div class="service-grid">
        <?php foreach($services as $service): ?>
        <div class="service-card">
          <div class="service-icon"><?= $service['icon'] ?></div>
          <h3><?= $service['name'] ?></h3>
          <p><?= $service['description'] ?></p>
          <div class="service-meta">
            <span class="price"><?= $service['price'] ?></span>
            <span class="duration">⏱ <?= $service['duration'] ?></span>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="text-center">
        <a href="?route=services" class="btn-secondary">Alle Dienstleistungen ansehen →</a>
      </div>
    </div>
  </section>

  <section class="testimonials">
    <div class="container">
      <h2>Was meine Kunden sagen</h2>
      <div class="testimonial-grid">
        <?php foreach($testimonials as $t): ?>
        <div class="testimonial-card">
          <div class="stars"><?= str_repeat('★', $t['rating']) . str_repeat('☆', 5 - $t['rating']) ?></div>
          <p class="quote">„<?= $t['quote'] ?>“</p>
          <p class="customer"><strong><?= $t['name'] ?></strong><br><small><?= $t['instrument'] ?></small></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>