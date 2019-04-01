<div class="jumbotron">
    <h2><?= $post->title ?></h2>
    <p><em><?= $post->categorie ?></em></p>
    <hr size="5" width="50%" align=center/>

    <p><?= $post->content ?></p>

    <?php foreach ($comments as $comment) : ?>
        <div class="comment row" style="border: solid 1px #DDD;">
            <div class="col-sm-2">
                <img src="http://www.gravatar.com/avatar/--><?= md5($comment->email) ?><" width="70%" alt=" ">
            </div>
            <div class="col-xs-10">
                <p>
                    <strong><?= $comment->username ?></strong>
                    <em><?= date('d/m/Y', strtotime($comment->created)) ?></em>
                </p>
                <p>
                    <?= $comment->content ?>
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>
