<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}

ob_start();
if ($page === 'home') {
    //require ROOT . '/app/Views/admin/posts/index.php';
    $controller = new \App\Controller\PostsController();
    $controller->index();
} elseif ($page === 'posts.category') {
    //require ROOT . '/app/Views/admin/posts/edit.php';
    $controller = new \App\Controller\PostsController();
    $controller->categories();
} elseif ($page === 'posts.show') {
    //require ROOT . '/app/Views/admin/posts/edit.php';
    $controller = new \App\Controller\PostsController();
    $controller->show();
} elseif ($page === 'login') {
    //require ROOT . '/app/Views/admin/categories/edit.php';
    $controller = new \App\Controller\UsersController();
    $controller->login();
} elseif ($page === 'posts.edit') {
    //require ROOT . '/app/Views/admin/posts/edit.php';
    $controller = new \App\Controller\Admin\PostsController();
    $controller->edit();
} elseif ($page === 'posts.add') {
    //require ROOT . '/app/Views/admin/posts/edit.php';
    $controller = new \App\Controller\Admin\PostsController();
    $controller->add();
} elseif ($page === 'posts.delete') {
    //require ROOT . '/app/Views/admin/posts/edit.php';
    $controller = new \App\Controller\Admin\PostsController();
    $controller->delete();
} elseif ($page === 'categories.index') {
    //require ROOT . '/app/Views/admin/categories/index.php';
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->index();
} elseif ($page === 'categories.edit') {
    //require ROOT . '/app/Views/admin/categories/edit.php';
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->edit();
} elseif ($page === 'categories.add') {
    //require ROOT . '/app/Views/admin/categories/edit.php';
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->add();
} elseif ($page === 'categories.delete') {
    //require ROOT . '/app/Views/admin/categories/edit.php';
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->delete();
}

$content = ob_get_clean();

require ROOT . '/app/Views/templates/default.php';