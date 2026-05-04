<?php include 'includes/init.php'; ?>
<?php include 'includes/header.php'; ?>

<main>
  <?php template('page-header', [
        'title' => 'Meine Dienstleistungen',
        'subtitle' => 'Von der Hand eines Meisters – fair, transparent und mit Liebe zum Detail'
    ]); ?>
  <?php template('services', ['services' => getServices()]); ?>
  <?php template('cta-section', []); ?>
</main>

<?php include 'includes/footer.php'; ?>