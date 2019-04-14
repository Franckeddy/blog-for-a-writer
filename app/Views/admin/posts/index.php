<h2>Administrer les billets</h2>
<p>
    <a href="?p=admin.posts.add" class="btn btn-success">Ajouter</a>
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
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= $post->title ?></td>
            <td>
                <a class="btn btn-primary" href="adminposts/<?= $post->id ?>">Editer</a>
                <form action="deleteposts" method="post" style="display: inline;">
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
<h2>Administrer les Catégories</h2>
<p>
    <a href="admincategories" class="btn btn-outline-warning">Go</a>
</p>
