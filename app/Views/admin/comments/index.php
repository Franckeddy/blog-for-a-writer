<h2>Administrer les commentaires</h2>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <td>Id</td>
            <td style="width: 70%">Contenu</td>
            <td>Action</td>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td><?= $comment['id'] ?></td>
                <td><?= $comment['content'] ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.comments.edit&id=<?= $comment['id'] ?>">Editer</a>
                    <form action="?p=admin.comments.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                        <button type="submit" class="btn btn-danger"
                                onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<HR align=center size=8 width="50%">
<div class="row" style="padding-top: 1em">
    <div class="col-6">
        <h3>Administrer les Billets</h3>
        <p>
            <a href="?p=admin.posts.index" class="btn btn-outline-warning">Go</a>
        </p>
    </div>
    <div class="col-6">
        <h3>Administrer les Catégories</h3>
        <p>
            <a href="?p=admin.categories.index" class="btn btn-outline-warning">Go</a>
        </p>
    </div>
</div>
<HR align=center size=8 width="50%">
<a href="index" class="btn btn-outline-secondary">Retour à l'acceuil.</a>