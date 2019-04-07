<?php

use App\Controller\Admin\CategoriesController;
use App\Controller\PostsController;
use App\Controller\UsersController;
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

$page = $_GET['p'] ?? 'home';

//-----------------------------------------------------------Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if (!$auth->logged()) {
    $app->forbidden();
}

ob_start();
if ($page === 'home') {
    $controller = new PostsController();
    $controller->index();
} elseif ($page === 'login') {
    $controller = new UsersController();
    $controller->login();
    //-----------------------------------------------------------Posts
} elseif ($page === 'posts.category') {
    $controller = new PostsController();
    $controller->categories();
} elseif ($page === 'posts.show') {
    $controller = new PostsController();
    $controller->show();
} elseif ($page === 'posts.edit') {
    $controller = new \App\Controller\Admin\PostsController();
    $controller->edit();
} elseif ($page === 'posts.add') {
    $controller = new \App\Controller\Admin\PostsController();
    $controller->add();
} elseif ($page === 'posts.delete') {
    $controller = new \App\Controller\Admin\PostsController();
    $controller->delete();
    //-----------------------------------------------------------Categories
} elseif ($page === 'categories.index') {
    $controller = new CategoriesController();
    $controller->index();
} elseif ($page === 'categories.edit') {
    $controller = new CategoriesController();
    $controller->edit();
} elseif ($page === 'categories.add') {
    $controller = new CategoriesController();
    $controller->add();
} elseif ($page === 'categories.delete') {
    $controller = new CategoriesController();
    $controller->delete();
}

$content = ob_get_clean();

require ROOT . '/app/Views/templates/default.php';
