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
}
