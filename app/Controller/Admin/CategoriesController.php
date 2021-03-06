<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use App\Controller\AppController;

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

    public function index()
    {
        $categories = $this->Category->all();
        $this->render('admin.categories.index', compact('categories'));
    }

    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Category->create([
                'title' => $_POST['title']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'title' => $_POST['title'],
            ]);
            return $this->index();
        }
        $categories = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($categories);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }
}
