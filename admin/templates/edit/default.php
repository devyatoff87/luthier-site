<?php
$section = $section ?? $_GET['section'] ?? 'hero';
?>

<?php if (isset($data) && is_array($data) && count($data) > 0): ?>
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