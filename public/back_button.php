<?php
// Ellenőrzi, hogy van előző oldal
$previous_page = $_SERVER['HTTP_REFERER'] ?? 'index.php'; // Alapértelmezett oldal, ha nincs 'HTTP_REFERER'
?>

<a href="<?= htmlspecialchars($previous_page) ?>" class="btn btn-secondary">Vissza</a>
