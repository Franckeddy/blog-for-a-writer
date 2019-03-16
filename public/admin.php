<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p']))
{
    $page = $_GET['p'];
}
else{
    $page = 'home';
}

ob_start();
if ($page === 'home')
{
    require ROOT . '/app/Views/admin/posts/index.php';
}
elseif ($page === 'posts.edit')
{
    require ROOT . '/app/Views/admin/posts/edit.php';
}
elseif ($page === 'posts.add')
{
    require ROOT . '/app/Views/admin/posts/edit.php';
}
elseif ($page === 'posts.delete')
{
    require ROOT . '/app/Views/admin/posts/edit.php';
}
elseif ($page === 'categories.index')
{
    require ROOT . '/app/Views/admin/categories/index.php';
}
elseif ($page === 'categories.edit')
{
    require ROOT . '/app/Views/admin/categories/edit.php';
}
elseif ($page === 'categories.add')
{
    require ROOT . '/app/Views/admin/categories/edit.php';
}
elseif ($page === 'categories.delete')
{
    require ROOT . '/app/Views/admin/categories/edit.php';
}

$content = ob_get_clean();

require ROOT . '/app/Views/templates/default.php';