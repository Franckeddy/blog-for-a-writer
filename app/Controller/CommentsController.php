<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\Controller\Controller;
use \App;
use Core\HTML\BootstrapForm;

class CommentsController extends AppController
{
    private $pdo;

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
                header('location: index.php?p=admin.posts.index');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    public function save()
    {
        $errors = [];
        if (empty($_POST['username'])) {
            $errors['username'] = $this->options['username_error'];
        }
        if (empty($_POST['email']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = $this->options['email_error'];
        }
        if (empty($_POST['content'])) {
            $errors['content'] = $this->options['content_error'];
        }
        if (count($errors) > 0) {
            $this->errors = $errors;
            return false;
        }
        $q = $this->pdo->prepare('
            INSERT INTO comments SET
            username = :username,
            email    = :email,
            content  = :content,
            ref_id   = :ref_id,
            ref      = :ref,
            created  = :created');
        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'content' => $_POST['content'],
            'ref_id' => $ref_id,
            'created' => date('Y-m-d H:i:s')
        ];
        return $q->execute($data);
    }
}
