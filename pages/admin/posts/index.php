<?php
$posts = App::getInstance()->getTable('Post')->all();
?>

<h1>Administrer les Articles</h1>

<table class="table">
    <thead>
    <td>ID</td>
    <td>Titre</td>
    <td>Action</td>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->title; ?></td>
            <td>
                <a class="btn btn-primary" href="?p=posts.edit&id=<? $post->id; ?>">Editer</a>
            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>