<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

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
}
