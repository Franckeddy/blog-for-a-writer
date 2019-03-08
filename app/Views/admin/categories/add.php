<?php

$table = App::getInstance()->getTable('Category');

if (!empty($_POST)){
    $result = $table->create([
        'title' => $_POST['title'],
    ]);
    if($result)
    {
        header('Location: admin.php?p=categories.index');
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('title', 'Titre de la categorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>