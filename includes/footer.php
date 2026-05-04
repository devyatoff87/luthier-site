<?php
// Stelle sicher, dass $contact verfügbar ist
if (!isset($contact) && file_exists(__DIR__ . '/data.php')) {
    include __DIR__ . '/data.php';
}
?>
<footer class="footer">
  <div class="container">
    <div class="footer-content">
      <div class="footer-section">
        <h4>Luthier Werkstatt</h4>
        <p>Handwerk mit Tradition & Leidenschaft</p>
      </div>
      <div class="footer-section">
        <h4>Kontakt</h4>
        <p><?php echo $contact['address'] ?? 'Adresse folgt'; ?></p>
        <p>Tel: <?php echo $contact['phone'] ?? '—'; ?></p>
        <p>Email: <?php echo $contact['email'] ?? '—'; ?></p>
      </div>
      <div class="footer-section">
        <h4>Öffnungszeiten</h4>
        <p><?php echo $contact['hours'] ?? '—'; ?></p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> Luthier Werkstatt. Alle Rechte vorbehalten.</p>
    </div>
  </div>
</footer>

<script src="js/main.js"></script>
</body>

</html>