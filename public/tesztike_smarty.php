<?php

// Composer autoload betöltése
require_once __DIR__ . '/../vendor/autoload.php';


$a = new \Smarty\Smarty();

// Hogy minden oké-e, próbáljuk meg például a \Smarty osztályt egyenesen
if (class_exists('Smarty')) {
    echo 'Smarty osztály betöltődött!';
} else {
    echo 'Nem található a Smarty osztály!';
}


?>