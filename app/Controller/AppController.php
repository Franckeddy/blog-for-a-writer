<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

/**
 * Class AppController
 * @package App\Controller
 */
class AppController extends Controller
{
    protected $template = 'default';

    /**
     * AppController constructor.
     */
    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * @param $model_name
     */
    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

    /**
     * @param $title
     */
    protected function setTitle($title)
    {
        $app = \App::getInstance();
        $app->title = $title . ' | ' . $app->title;
    }
}
