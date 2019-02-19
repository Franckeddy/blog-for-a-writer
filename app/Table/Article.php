<?php

namespace App\Table;

use App\App;

class Article extends Table
{
    public static function getLast()
    {
        return self::query("
                SELECT articles.id, articles.title, articles.content, categories.title as categorie 
                FROM articles 
                LEFT JOIN categories 
                ON category_id = categories.id
                ");
    }

    public static function lastByCategory($category_id)
    {
        return self::query("
                SELECT articles.id, articles.title, articles.content, categories.title as categorie 
                FROM articles 
                LEFT JOIN categories 
                ON category_id = categories.id
                WHERE category_id = ?
                prepare 
                ", [$category_id]);
    }

    public function getUrl()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->content, 0, 300) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}