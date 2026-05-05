<?php
$section = $_GET['section'] ?? 'hero';
?>

<h1><?= htmlspecialchars($title ?? ucfirst($section) . ' bearbeiten') ?></h1>

<?php if (isset($success) && $success): ?>
<div class="alert success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<?php if (isset($error) && $error): ?>
<div class="alert error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST">
  <?php if ($section === 'services' && isset($data) && is_array($data)): ?>
  <!-- Dienstleistungen als Liste von Formularen -->
  <div id="services-list">
    <?php foreach ($data as $index => $service): ?>
    <div class="service-card" data-index="<?= $index ?>">
      <h3>Dienstleistung <?= $index + 1 ?></h3>
      <input type="hidden" name="services[<?= $index ?>][id]" value="<?= $index ?>">

      <label>Name:</label>
      <input type="text" name="services[<?= $index ?>][name]" value="<?= htmlspecialchars($service['name'] ?? '') ?>"
        required>

      <label>Beschreibung:</label>
      <textarea name="services[<?= $index ?>][description]"
        rows="3"><?= htmlspecialchars($service['description'] ?? '') ?></textarea>

      <label>Preis:</label>
      <input type="text" name="services[<?= $index ?>][price]" value="<?= htmlspecialchars($service['price'] ?? '') ?>">

      <label>Dauer:</label>
      <input type="text" name="services[<?= $index ?>][duration]"
        value="<?= htmlspecialchars($service['duration'] ?? '') ?>">

      <label>Icon:</label>
      <input type="text" name="services[<?= $index ?>][icon]" value="<?= htmlspecialchars($service['icon'] ?? '') ?>"
        placeholder="🔨">

      <button type="button" class="btn-remove-service" data-index="<?= $index ?>">Löschen</button>
      <hr>
    </div>
    <?php endforeach; ?>
  </div>

  <button type="button" id="add-service" class="btn btn-secondary">+ Weitere Dienstleistung</button>

  <?php elseif (isset($data) && is_array($data)): ?>
  <!-- Andere Sections: Normale Felder -->
  <?php foreach ($data as $key => $value): ?>
  <div class="form-field">
    <label for="field_<?= htmlspecialchars($key) ?>">
      <?= htmlspecialchars(ucfirst(str_replace('_', ' ', $key))) ?>:
    </label>

    <?php if (is_array($value)): ?>
    <textarea name="data[<?= htmlspecialchars($key) ?>]" id="field_<?= htmlspecialchars($key) ?>"
      rows="8"><?= htmlspecialchars(json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) ?></textarea>
    <small class="hint">Array/Objekt – bitte als gültiges JSON bearbeiten</small>
    <?php else: ?>
    <input type="text" name="data[<?= htmlspecialchars($key) ?>]" id="field_<?= htmlspecialchars($key) ?>"
      value="<?= htmlspecialchars((string)$value) ?>">
    <?php endif; ?>
  </div>
  <?php endforeach; ?>
  <?php else: ?>
  <div class="alert error">Keine Daten gefunden für: <?= htmlspecialchars($section) ?></div>
  <?php endif; ?>

  <div class="form-actions">
    <a href="index.php" class="btn btn-secondary">← Zurück zum Dashboard</a>
    <button type="submit" name="save" class="btn btn-primary">Speichern</button>
  </div>
</form>

<?php if ($section === 'services'): ?>
<script>
// Dynamische Dienstleistungen
document.getElementById('add-service')?.addEventListener('click', function() {
  const container = document.getElementById('services-list');
  const index = container.children.length;

  const div = document.createElement('div');
  div.className = 'service-card';
  div.setAttribute('data-index', index);
  div.innerHTML = `
        <h3>Dienstleistung ${index + 1}</h3>
        <input type="hidden" name="services[${index}][id]" value="${index}">
        <label>Name:</label>
        <input type="text" name="services[${index}][name]" required>
        <label>Beschreibung:</label>
        <textarea name="services[${index}][description]" rows="3"></textarea>
        <label>Preis:</label>
        <input type="text" name="services[${index}][price]">
        <label>Dauer:</label>
        <input type="text" name="services[${index}][duration]">
        <label>Icon:</label>
        <input type="text" name="services[${index}][icon]" placeholder="🔨">
        <button type="button" class="btn-remove-service" data-index="${index}">Löschen</button>
        <hr>
    `;

  div.querySelector('.btn-remove-service').addEventListener('click', function() {
    div.remove();
    // Indizes neu nummerieren
    document.querySelectorAll('.service-card').forEach((card, i) => {
      card.querySelector('h3').textContent = `Dienstleistung ${i + 1}`;
      card.querySelector('input[name$="[id]"]').value = i;
    });
  });

  container.appendChild(div);
});

// Remove-Buttons initialisieren
document.querySelectorAll('.btn-remove-service').forEach(btn => {
  btn.addEventListener('click', function() {
    this.closest('.service-card').remove();
    document.querySelectorAll('.service-card').forEach((card, i) => {
      card.querySelector('h3').textContent = `Dienstleistung ${i + 1}`;
      card.querySelector('input[name$="[id]"]').value = i;
    });
  });
});
</script>
<?php endif; ?>