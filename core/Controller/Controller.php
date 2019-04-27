<?php

namespace Core\Controller;

class Controller
{
    /**
     * Chemin vers le dossier qui contient les vues
     */
    protected $viewPath;
    protected $template;

    /**
     * Génération des vues
     * @param $view
     * @param array $variables
     */
    protected function render($view, $variables = [])
    {
        ob_start();
        extract($variables, EXTR_OVERWRITE);
        require $this->viewPath . str_replace('.', '/', $view) . '.php';
        $content = ob_get_clean();
        require $this->viewPath . 'templates/' . $this->template . '.php';
    }

    /**
     *
     */
    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    /**
     *
     */
    protected function notFound()
    {
        header('HTTP/1.0 404 not found');
        die('Page introuvable');
    }
}
