<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{
    protected $table = 'billets';

    /**
     * Récupére les derniers articles
     * @return array
     */
    public function last(): array
    {
        return $this->query('
        SELECT billets.id, billets.title, billets.content, billets.date, categories.title as categorie
        FROM billets
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY billets.date DESC');
    }


    /**
     * Récupére un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id): \App\Entity\PostEntity
    {
        return $this->query('
        SELECT billets.id, billets.title, billets.content, billets.date, categories.title as categorie
        FROM billets
        LEFT JOIN categories ON category_id = categories.id
        WHERE billets.id = ?', [$id], true);
    }

    /**
     * Récupére les derniers articles de la category demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id): array
    {
        return $this->query('
        SELECT billets.id, billets.title, billets.content, billets.date, categories.title as categorie
        FROM billets
        LEFT JOIN categories ON category_id = categories.id
        WHERE billets.category_id = ?
        ORDER BY billets.date DESC', [$category_id]);
    }
}
