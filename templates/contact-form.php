<?php
/**
 * @var string $csrf_token
 */
?>
<div class="contact-form">
  <h2>Schreib mir eine Nachricht</h2>
  <form action="send.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    <input type="text" name="name" placeholder="Dein Name" required>
    <input type="email" name="email" placeholder="Deine E-Mail" required>
    <input type="text" name="subject" placeholder="Betreff">
    <textarea name="message" rows="5" placeholder="Deine Nachricht..." required></textarea>
    <button type="submit" class="btn-primary">Nachricht senden</button>
  </form>
</div>