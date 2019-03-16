<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $billets = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts/index', compact('posts', 'categories'));
    }

    public function category()
    {
        $categorie = $this->Category->find($_GET['id']);
        if ($categorie === false)
        {
            $this->notFound();
        }
        $billets = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('billets', 'categories', 'categorie'));
    }

    public function show(){
        $billet = $this->Post->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('billet'));
    }
}