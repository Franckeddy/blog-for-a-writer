<?php
//settings for xdebug reporting error
ini_set('xdebug.collect_vars', 'on');
ini_set('xdebug.collect_params', '4');
ini_set('xdebug.dump_globals', 'on');
ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
ini_set('xdebug.show_local_vars', 'on');
ini_set('xdebug.default_enable', 'off');
ini_set('xdebug.cli_color', '1');
ini_set('xdebug.filename_format', '%a');
ini_set('xdebug.overload_var_dump', 'enable');

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'posts.index';
}

$page = explode('.', $page);

if ($page[0] === 'admin') {
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    //$controller    = new $controller();
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();