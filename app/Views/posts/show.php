<div class="jumbotron" style="overflow: scroll;">
    <h2 style="padding-bottom: 2em"><?= $post->title ?></h2>
    Cat. <strong><?= $post->categorie ?></strong>
    <hr size="5" width="50%" align=center/>
    <p><?= $post->content ?></p>
</div>
<hr size="5" width="50%" align=center/>
<h3>Commentaires</h3>
<?php foreach ($comments as $comment) : ?>
    <div id="text" class="row" style="width: auto;margin:10px 2em;border:1px dotted gray;background-color: #dff0d8">
        <div class="col-md-2">
            <img src="http://www.gravatar.com/avatar/<?= md5($comment['username']) ?>" width="100%" alt="Logo">
        </div>
        <div class="col-md-10">
            <p>
                Commentaire posté par: <strong><?= $comment['username'] ?>, </strong>
                le <em><?= date('d/m/Y', strtotime($comment['created'])) ?></em>
            </p>
            <p>
                <?= $comment['content'] ?>
            </p>
        </div>
    </div>
<?php endforeach ?>
<hr size="5" width="50%" align=center/>
<h3>Poster un commentaire</h3>
<div class="container">
    <form action="#comment" role="form" method="post" id="comment">
        <div class="row" style="width: auto">
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->input('username', 'Votre Pseudo') ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?= $form->input('email', 'Votre Email') ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <?= $form->input('content', 'Votre commentaire', ['type' => 'textarea']) ?>
                </div>
                <button type="submit" class="btn btn-primary"
                        onclick="return(confirm('Confirmer l\'envoie du commentaire?'));">Envoyer
                </button>
            </div>
        </div>
    </form>
</div>
<HR align=center size=8 width="50%">
<div class="row">
    <div class="col-12">
        <a href="../index" class="btn btn-outline-secondary" style="float: right">Retour à l'acceuil.</a>
    </div>
</div>
<style>
a{
    disabled="disable"
}
</style>
