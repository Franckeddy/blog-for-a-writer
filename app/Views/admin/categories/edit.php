<form method="post">
    <?= $form->input('title', 'Titre de la catégorie') ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
<HR align=center size=8 width="50%">
<div class="row">
    <div class="col-6">
        <a href="?p=admin.categories.index" class="btn btn-outline-info">Retour à l'admin.</a>
    </div>
    <div class="col-6">
        <a href="index.php" class="btn btn-outline-secondary" style="float: right">Retour à l'acceuil.</a>
    </div>
</div>
