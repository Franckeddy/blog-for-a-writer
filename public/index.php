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

/**
 * par defaut pointe vers post.index
 */
$page = $_GET['p'] ?? 'posts.index';

/**
 * séparation de la page par rapport au point.
 */
$page = explode('.', $page);

/**
 * deux parties, en premier le controlleur puis l'action à appeler.
 * si la page est admin on appele les controllers dans le namespace 'admin' sinon dans le namespace Controller
 */
if ($page[0] === 'admin') {
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();
