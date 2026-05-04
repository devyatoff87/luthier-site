<?php
/**
 * Template Helper – sichere Einbindung von Templates mit Variablenübergabe
 */
function template(string $name, array $data = []): void {
    $file = __DIR__ . "/../templates/{$name}.php";

    if (!file_exists($file)) {
        if ($_SERVER['SERVER_NAME'] === 'localhost') {
            echo "<pre>Fehler: Template '{$name}' nicht gefunden in: {$file}</pre>";
        }
        return;
    }

    extract($data);
    include $file;
}