<?php

$category = App::getInstance()->getTable('Category');

if (!empty($_POST))
{
    $result = $category->delete($_POST['id']);
    header('location: admin.php?p=categories.index');
}