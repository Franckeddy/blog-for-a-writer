<h2>Administrer les categories</h2>
<p>
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
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
    <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?= $category->id ?></td>
            <td><?= $category->title ?></td>
            <td>
                <a class="btn btn-primary" href="admincategories/<?= $category->id ?>">Editer</a>
                <form action="?p=admin.categories.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $category->id ?>">
                    <button type="submit"
                            class="btn btn-danger"
                            onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<HR align=center size=8 width="50%">
<h2>Administrer les Billets</h2>
<p>
    <a href="?p=admin.posts.index" class="btn btn-outline-warning">Go</a>
</p>
