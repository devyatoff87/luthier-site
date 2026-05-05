<div id="services-list">
  <?php if (isset($data) && is_array($data) && count($data) > 0): ?>
  <?php foreach ($data as $index => $service): ?>
  <div class="service-card">
    <h3>Dienstleistung <?= $index + 1 ?></h3>
    <input type="hidden" name="services[<?= $index ?>][id]" value="<?= $index ?>">

    <label>Name:</label>
    <input type="text" name="services[<?= $index ?>][name]" value="<?= htmlspecialchars($service['name'] ?? '') ?>"
      required>

    <label>Beschreibung (eine Leistung pro Zeile):</label>
    <textarea name="services[<?= $index ?>][description]"
      rows="5"><?= htmlspecialchars(implode("\n", $service['description'] ?? [])) ?></textarea>
    <small class="hint">Jede Zeile wird ein Aufzählungspunkt</small>

    <label>Preis:</label>
    <input type="text" name="services[<?= $index ?>][price]" value="<?= htmlspecialchars($service['price'] ?? '') ?>">

    <label>Dauer:</label>
    <input type="text" name="services[<?= $index ?>][duration]"
      value="<?= htmlspecialchars($service['duration'] ?? '') ?>">

    <label>Bild (Pfad):</label>
    <input type="text" name="services[<?= $index ?>][image]" value="<?= htmlspecialchars($service['image'] ?? '') ?>"
      placeholder="images/services/name.jpg">

    <button type="button" class="btn-remove-service">🗑️ Löschen</button>
    <hr>
  </div>
  <?php endforeach; ?>
  <?php else: ?>
  <div class="alert info">Keine Dienstleistungen vorhanden.</div>
  <?php endif; ?>
</div>

<button type="button" id="add-service" class="btn btn-secondary">+ Weitere Dienstleistung</button>