<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use App\Controller\AppController;

class CommentsController extends AppController
{
    /**
     * CommentsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Comment');
    }

    public function index()
    {
        $comments = $this->Comment->all();
        $this->render('admin.comments.index', compact('comments'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            return $this->index();
        }
    }

    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Comment->create([
                'username' => $_POST['username'],
                'email' => $_GET['email'],
                'content' => $_POST['content'],
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('posts.show', compact('form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Comment->update($_GET['id'], [
                'Contenu' => $_POST['content'],
            ]);
            return $this->index();
        }
        $comments = $this->Comment->find($_GET['id']);
        $form = new BootstrapForm($comments);
        $this->render('admin.comments.edit', compact('form'));
    }
}
