<?php
$post = $db->prepare('SELECT * FROM articles WHERE ID = ?', [$_GET['ID']], 'App\Table\Article', true);
?>

<h1><?= $post->title; ?></h1>
<p><?= $post->content; ?></p>
