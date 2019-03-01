<?php

use App\App;
use App\Table\Billet;

$post = Billet::find($_GET['id']);
if ($post === false) {
    App::notFound();
}
App::setTitle($post->title);
?>
<div class="jumbotronum">
    <h2><?= $post->title; ?></h2>
    <p><em><?= $post->categorie; ?></em></p>
    <p><?= $post->content; ?></p>
</div>