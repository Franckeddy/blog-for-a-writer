<?php

require '../app/Autoloader.php';

App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

/**
 * Turn on output buffering
 * @link https://php.net/manual/en/function.ob-start.php
 */
ob_start();

if ($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'billet') {
    require '../pages/single.php';
} elseif ($p === 'categorie') {
    require '../pages/categorie.php';
}

/**
 * Get current buffer contents and delete current output buffer
 * @link https://php.net/manual/en/function.ob-get-clean.php
 * @return string|false the contents of the output buffer and end output buffering.
 * If output buffering isn't active then false is returned.
 */
$content = ob_get_clean();

require '../pages/templates/default.php';