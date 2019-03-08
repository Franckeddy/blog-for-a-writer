<?php

$table = App::getInstance()->getTable('Category');

if (!empty($_POST)){
    $result = $table->update($_GET['id'], [
        'title' => $_POST['title'],
    ]);
    if($result)
    {
        ?>
        <div class="alert alert-success">La Catégorie à bien été modifiée</div>
        <?php
    };
}
$categorie = $table->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($categorie);
?>

<form method="post">
    <?= $form->input('title', 'Titre de la catégorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>