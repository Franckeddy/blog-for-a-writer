<?php
///**
// * Récupération du billets
// */
//if (!isset($_GET['id'])){
//    throw new Exception('404');
//}
//$q = $DB->prepare('
//SELECT *
//FROM billets
//WHERE id = :id');
//$q-execute(['id' => $_GET['id']]);
//$post = $q->fetch();
//if(!$post){
//    throw new Exception('404');
//}
//
///**
// * Nos Commentaires
// */
//use App\Table\Comments;
//$comments_cls = new Comments($DB);
//
//
//// soumission d'un commentaire
//$errors = false;
//$success = false;
//if (isset($_POST['action']) && $_POST['action'] === 'comment')
//{
//    $save = $comments_cls->save('billets', $post->id);
//    if ($save)
//    {
//        $success = true;
//    }else
//    {
//        $errors = $comments_cls->errors;
//    }
//}
//$comments = $comments_cls->findAll('posts', $post->id);
//
//?>
<?//= $post=content; ?>
<!---->
<!--<h2>--><?//= count($comments); ?><!-- Commentaires</h2>-->
<?php //if ($errors): ?>
<!--<div class="alert alert-danger">-->
<!--    <strong>Impossible de poster le commentaire</strong>Pour les raisons suivantes-->
<!--    <ul>-->
<!--        --><?php //foreach ($errors as $error): ?>
<!--        <li>--><?//= $errors; ?><!--</li>-->
<!--        --><?php //endforeach; ?>
<!--    </ul>-->
<!--</div>-->
<?php //endif; ?>
<?php //if ($success): ?>
<!--    <div class="alert alert-success">-->
<!--        <strong>Parfait</strong> Votre commentaire à bien été posté-->
<!--        </ul>-->
<!--    </div>-->
<?php //endif; ?>
<!--<form action="#comment" role="form" method="post" id="comment">-->
<!--    <div class="row">-->
<!--        <div class="col-xs-6">-->
<!--            <div class="form-group">-->
<!--                <label>Pseudo</label>-->
<!--                <input type="text" class="form-control" name="username" required>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-xs-6">-->
<!--            <div class="form-group">-->
<!--                <label>Email</label>-->
<!--                <input type="email" class="form-control" name="email" required>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-xs-12">-->
<!--            <div class="form-group">-->
<!--                <label>Commentaire</label>-->
<!--                <textarea class="form-control" name="content" required></textarea>-->
<!--            </div>-->
<!--            <button type="submit" class="btn btn-primary">Envoyer</button>-->
<!--        </div>-->
<!--        <input type="hidden" name="action" value="comment">-->
<!--    </div>-->
<!--</form>-->
<!--<p>&nbsp;</p>-->
<?php //foreach ($comments as $comment): ?>
<!--<div class="comment row" style="border: solid 1px #DDD;">-->
<!--    <div class="col-sm-2">-->
<!--        <img src="http://www.gravatar.com/avatar/--><?//= md5($comment->email); ?><!--" width="70%">-->
<!--    </div>-->
<!--    <div class="col-xs-10">-->
<!--        <p>-->
<!--            <strong>--><?//= $comment->username; ?><!--</strong>-->
<!--            <em>--><?//= date('d/m/Y', strtotime($comment->created)); ?><!--</em>-->
<!--        </p>-->
<!--        <p>-->
<!--            --><?//= $comment->content; ?>
<!--        </p>-->
<!--    </div>-->
<!--</div>-->
<?php //endforeach ?>