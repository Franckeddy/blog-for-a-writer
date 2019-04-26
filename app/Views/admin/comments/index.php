<h2>Administrer les commentaires</h2>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <td><strong>ID</strong></td>
            <td><strong style="width: 70%"><strong>Contenu</strong></td>
            <td><strong>Action</strong></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td><?= $comment['id'] ?></td>
                <td>
                    <?php $chaine = (string)$comment['content'];
                    echo htmlspecialchars($chaine, ENT_COMPAT); ?>
                </td>
                <td>
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
<div class="row">
    <div class="col-6">
        <a href="?p=admin.categories.index" class="btn btn-outline-info">Retour à l'admin.</a>
    </div>
    <div class="col-6">
        <a href="index.php" class="btn btn-outline-secondary" style="float: right">Retour à l'acceuil.</a>
    </div>
</div>