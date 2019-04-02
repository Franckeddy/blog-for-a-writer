<h2>Administrer les commentaires</h2>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($comments as $comment) : ?>
        <tr>
            <td><?= $comment->id; ?></td>
            <td><?= $comment->title ?></td>
            <td>
                <a class="btn btn-primary" href="admincomment/<?= $comment->id ?>">Editer</a>
                <form action="?p=admin.comments.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $comment->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
