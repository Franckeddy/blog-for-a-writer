<?php

$app = App::getInstance();
$categorie = $app->getTable('Category')->find($_GET['id']);
if ($categorie === false)
{
    $app->notFound();
}

$billets = $app->getTable('Post')->lastByCategory($_GET['id']);
$categories = $app->getTable('Category')->All();

?>

<div class="row">
    <div class="col-sm-8">
        <?php foreach ($billets as $post): ?>
            <h2>
                <a href="<?= $post->url; ?>"><?= $post->title; ?></a>
            </h2>
            <p>
                <em><?= $post->categorie; ?></em>
            </p>
            <p>
                <?= $post->extrait; ?>
            </p>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach ($categories as $categorie): ?>
                <li>
                    <a href="<?= $categorie->url; ?>"><?= $categorie->title; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
