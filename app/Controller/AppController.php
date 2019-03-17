<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller
{
    protected $template = 'default';
    protected $viewPath;

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

    protected function setTitle ($title)
    {
        $app = \App::getInstance();
        $app->title=$title.' | ' .$app->title;
    }

}