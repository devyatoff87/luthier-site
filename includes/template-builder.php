 <?php
/**
 * Template Helper Funktion
 *
 * Bindet ein Template ein und übergibt ihm Variablen
 *
 * @param string $name Template-Name (ohne .php)
 * @param array $data Assoziatives Array mit Variablen für das Template
 */
function template($name, $data = []) {
    $templatePath = __DIR__ . "/../templates/{$name}.php";

    if (!file_exists($templatePath)) {
        die("Template '{$name}' nicht gefunden.");
    }

    // Extrahiere die Daten in lokale Variablen
    extract($data);

    // Binde das Template ein
    include $templatePath;
}
?>