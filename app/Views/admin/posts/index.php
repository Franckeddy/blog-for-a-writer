<h1>Administrer les billets</h1>

<p>
    <a href="?p=posts.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->title; ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.posts.edit&id=<? $post->id; ?>">Editer</a>

                <form action="?p=admin.posts.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>