<h2>Administrer les billets</h2>
<p>
    <a href="?p=admin.posts.add" class="btn btn-success">Ajouter</a>
</p>
<table class="table">
    <thead>
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>Titre</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= $post->title ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.posts.edit&id=<?= $post->id ?>">Editer</a>
                <form action="?p=admin.posts.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <button type="submit" class="btn btn-danger"
                            onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<HR align=center size=8 width="50%">
<div class="row" style="padding-top: 1em">
    <div class="col-6">
        <h3>Administrer les Catégories</h3>
        <p>
            <a href="?p=admin.categories.index" class="btn btn-outline-warning">Go</a>
        </p>
    </div>
    <div class="col-6">
        <h3>Administrer les Commentaires</h3>
        <p>
            <a href="?p=admin.comments.index" class="btn btn-outline-warning">Go</a>
        </p>
    </div>
</div>
<HR align=center size=8 width="50%">
<a href="index.php" class="btn btn-outline-secondary">Retour à l'acceuil.</a>

