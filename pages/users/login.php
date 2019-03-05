<?php
if (!empty($_POST))
{
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    if ($auth->login($_POST['username'], $_POST['password']))
    {
        die('Connecte');
    }else{
        die('non Connecté');
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>