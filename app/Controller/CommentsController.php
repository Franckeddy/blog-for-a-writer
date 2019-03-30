<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class CommentsController extends AppController
{
    public function __construct()
    {
        $this->loadModel('Comment');
    }
}
