<?php

use App\App;
use App\Table\Article;
use App\Table\Categorie;

$post = Article::find($_GET['id']);
if ($post === false)
{
    App\App::notFound();
}

$categorie = Categorie::find($post->category_id);
?>

<h1><?= $post->title; ?></h1>
<p><em><?= $categorie->title; ?></em></p>
<p><?= $post->content; ?></p>
