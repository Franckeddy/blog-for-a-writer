<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\Controller\Controller;
use \App;
use Core\HTML\BootstrapForm;

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
        $this->render('comments.index', compact('comments'));
    }

    public function addComment()
    {
        $errors = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('location: adminposts');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }
}
