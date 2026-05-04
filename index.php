<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<main>
  <?php template('hero', ['hero' => getHeroData()]); ?>
  <?php template('welcome', [
        'welcomeText' => getWelcomeText(),
        'contactName' => $contact['name']
    ]); ?>
  <?php template('services-preview', ['services' => getServicesPreview(3)]); ?>
  <?php template('testimonials', ['testimonials' => getTestimonials()]); ?>
</main>

<?php include 'includes/footer.php'; ?>