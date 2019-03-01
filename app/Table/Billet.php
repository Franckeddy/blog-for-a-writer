<?php

namespace App\Table;

use App\App;

class Billet extends Table
{
    /**
     * @var string
     */
    protected static $table = 'billets';

    /**
     * @param $id
     * @return array|mixed
     */
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


    /**
     * @return array|mixed
     */
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

    /**
     * @param $category_id
     * @return array|mixed
     */
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

    /**
     * @return string
     */
    public function getUrl()
    {
        return 'index.php?p=billet&id=' . $this->id;
    }

    /**
     * @return string
     */
    public function getExtrait()
    {
        $html = '<p>' . substr($this->content, 0, 300) . '...</p>';
        $html .= '<p><a class="btn btn-outline-secondary" href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}
