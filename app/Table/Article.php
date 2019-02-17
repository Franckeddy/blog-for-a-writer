<?php

namespace App\Table;

use App\App;

class Article
{
    public static function gatLast()
    {
        return App::getDb()->query('SELECT * FROM articles', __CLASS__);
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl()
    {
        return 'index.php?p=article&ID=' . $this->ID;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->content, 0, 300) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}