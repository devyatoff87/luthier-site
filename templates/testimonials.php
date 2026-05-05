<?php
/**
 * @var array $testimonials
 */
?>
<section class="testimonials">
  <div class="container">
    <h2 class="text-center">Was meine Kunden sagen</h2>
    <div class="testimonial-grid">
      <?php foreach ($testimonials as $t): ?>
      <div class="testimonial-card">
        <div class="stars"><?= str_repeat('★', $t['rating']) . str_repeat('☆', 5 - $t['rating']) ?></div>
        <p class="quote">„<?= sanitizeOutput($t['quote']) ?>“</p>
        <p class="customer">
          <strong><?= sanitizeOutput($t['name']) ?></strong><br>
          <small><?= sanitizeOutput($t['instrument']) ?></small>
        </p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>