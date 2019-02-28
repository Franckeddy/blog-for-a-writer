<?php

namespace App\Table;

use App\App;

class Billet extends Table
{
    protected static $table = 'billets';

    public static function find($id)
    {
        return self::query("
                SELECT billets.id, billets.title, billets.content, categories.title as categorie 
                FROM billets 
                LEFT JOIN categories 
                ON category_id = categories.id
                WHERE  billets.id = ?
                ", [$id], true);
    }


    public static function getLast()
    {
        return self::query("
                SELECT billets.id, billets.title, billets.content, categories.title as categorie 
                FROM billets 
                LEFT JOIN categories 
                ON category_id = categories.id
                ORDER BY billets.date DESC 
                ");
    }

    public static function lastByCategory($category_id)
    {
        return self::query("
                SELECT billets.id, billets.title, billets.content, categories.title as categorie 
                FROM billets 
                LEFT JOIN categories 
                ON category_id = categories.id
                WHERE category_id = ? 
                ORDER BY billets.date DESC 
                ", [$category_id]);
    }

    public function getUrl()
    {
        return 'index.php?p=billet&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->content, 0, 300) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}