<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class CategoriesController extends AppController
{
    /**
     * CategoriesController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    /**
     *
     */
    public function index()
    {
        $categories = $this->Category->all();
        $this->render('categories.index', compact('categories'));
    }
}
