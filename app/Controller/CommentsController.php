<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;
use app\Table\CommentTable;

class CommentsController extends AppController
{
    /**
     * CommentsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Comment');
        $this->loadModel('Post');
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentTable($db);

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }

        header('Location: index.php?action=post&id=' . $postId);
    }
}
