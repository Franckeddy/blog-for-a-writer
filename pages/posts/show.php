<?php

$app = App::getInstance();
$post = $app->getTable('Post')->find($_GET['id']);
if ($post === false)
{
    $app->notFound();
}
$app->title = $post->title;

?>
<div class="jumbotron">
    <h2><?= $post->title; ?></h2>
    <p><em><?= $post->categorie; ?></em></p>
    <p><?= $post->content; ?></p>
</div>