<?php if ($errors) : ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('username', 'Pseudo') ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']) ?>
    <div style="display: inline">
        <button class="btn btn-primary">Envoyer</button>
        <a href="index.php" class="btn btn-outline-secondary">Retour à l'acceuil.</a>
    </div>
</form>
