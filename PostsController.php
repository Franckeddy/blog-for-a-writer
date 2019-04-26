<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;
use Core\HTML\BootstrapForm;

class PostsController extends AppController
{
    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    public function index()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    /**
     *
     */
    public function categories(): void
    {
        $categorie = $this->Category->find($_GET['id']);
        if ($categorie === false) {
            $this->notFound();
        }
        $billets = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('billets', 'categories', 'categorie'));
    }

    public function show()
    {
        $post = $this->Post->findWithCategory($_GET['id']);
        $comments = $this->Comment->showComments($_GET['id']);
        $form = new BootstrapForm($_POST);
        if (!empty($_POST)) {
            $result = $this->Comment->create([
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'content' => $_POST['content'],
                'ref_id' => $_GET['id'],
                'created' => date('Y-m-d H:i:s'),
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $this->render('posts.show', compact('post', 'comments', 'form'));
    }
}
