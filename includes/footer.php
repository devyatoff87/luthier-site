<?php
if (!isset($contact)) {
    $contact = getContact();
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
        <p><?= $contact['address'] ?></p>
        <p>Tel: <?= $contact['phone'] ?></p>
        <p>Email: <?= $contact['email'] ?></p>
      </div>
      <div class="footer-section">
        <h4>Öffnungszeiten</h4>
        <p><?= $contact['hours'] ?></p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> Luthier Werkstatt</p>
    </div>
  </div>
</footer>

<script src="js/main.js"></script>
</body>

</html>