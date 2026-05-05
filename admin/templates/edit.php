<?php
$section = $_GET['section'] ?? 'hero';
$data = $data ?? [];
?>

<h1><?= htmlspecialchars($title ?? ucfirst($section) . ' bearbeiten') ?></h1>

<?php if (isset($success) && $success): ?>
<div class="alert success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<?php if (isset($error) && $error): ?>
<div class="alert error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST">
  <?php if ($section === 'services'): ?>
  <?php include __DIR__ . '/edit/services.php'; ?>
  <?php else: ?>
  <?php include __DIR__ . '/edit/default.php'; ?>
  <?php endif; ?>

  <div class="form-actions">
    <a href="index.php" class="btn btn-secondary">← Zurück zum Dashboard</a>
    <button type="submit" name="save" class="btn btn-primary">Speichern</button>
  </div>
</form>

<!-- Custom Modal -->
<div id="customModal" class="custom-modal">
  <div class="custom-modal-content">
    <p id="customModalMessage"></p>
    <div class="custom-modal-buttons">
      <button class="cancel">Abbrechen</button>
      <button class="confirm">Löschen</button>
    </div>
  </div>
</div>

<?php if ($section === 'services'): ?>
<script>
// Custom Modal
const modal = document.getElementById('customModal');
const messageEl = document.getElementById('customModalMessage');
const confirmBtn = document.querySelector('#customModal .confirm');
const cancelBtn = document.querySelector('#customModal .cancel');
let pendingCard = null;

function showModal(message, card) {
  if (messageEl) messageEl.textContent = message;
  pendingCard = card;
  if (modal) modal.style.display = 'flex';
}

function hideModal() {
  if (modal) modal.style.display = 'none';
  pendingCard = null;
}

function deleteCard() {
  if (pendingCard) {
    pendingCard.remove();
  }
  hideModal();
}

if (confirmBtn) confirmBtn.addEventListener('click', deleteCard);
if (cancelBtn) cancelBtn.addEventListener('click', hideModal);
if (modal) {
  modal.addEventListener('click', function(e) {
    if (e.target === modal) hideModal();
  });
}

// Lösch-Buttons
document.querySelectorAll('.btn-remove-service').forEach(btn => {
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    const card = this.closest('.service-card');
    const nameInput = card.querySelector('input[name*="[name]"]');
    const name = nameInput ? nameInput.value : 'diese Dienstleistung';
    showModal(`"${name}" wirklich löschen?`, card);
  });
});

// Neue Dienstleistung
document.getElementById('add-service')?.addEventListener('click', function() {
  const container = document.getElementById('services-list');
  const index = container.children.length;

  const div = document.createElement('div');
  div.className = 'service-card';
  div.innerHTML = `
    <h3>Neue Dienstleistung</h3>
    <input type="hidden" name="services[${index}][id]" value="${index}">

    <label>Name:</label>
    <input type="text" name="services[${index}][name]" placeholder="Name" required>

    <label>Beschreibung (eine Leistung pro Zeile):</label>
    <textarea name="services[${index}][description]" placeholder="Beschreibung" rows="5"></textarea>
    <small class="hint">Jede Zeile wird ein Aufzählungspunkt</small>

    <label>Preis:</label>
    <input type="text" name="services[${index}][price]" placeholder="Preis">

    <label>Dauer:</label>
    <input type="text" name="services[${index}][duration]" placeholder="Dauer">

    <label>Bild (Pfad):</label>
    <input type="text" name="services[${index}][image]" placeholder="images/services/name.jpg">

    <button type="button" class="btn-remove-service">🗑️ Löschen</button>
    <hr>
  `;

  const newBtn = div.querySelector('.btn-remove-service');
  newBtn.addEventListener('click', function(e) {
    e.preventDefault();
    const nameInput = div.querySelector('input[name*="[name]"]');
    const name = nameInput ? nameInput.value : 'diese Dienstleistung';
    showModal(`"${name}" wirklich löschen?`, div);
  });

  container.appendChild(div);
});
</script>
<?php endif; ?>