<?php

namespace App\Table;

use App\Entity\CategoryEntity as CategoryEntityAlias;
use App\Entity\PostEntity;
use Core\Table\Table;

class CategoryTable extends Table
{
    protected $table = 'categories';

    /**
     * R?cup?re l'id de la cat?gorie associ?e
     * @return CategoryEntityAlias
     */
    public function findCategory($id)
    {
        return $this->query('
        SELECT billets.id, billets.title, billets.content, billets.date, categories.title as categorie
        FROM billets
        LEFT JOIN categories ON category_id = categories.id
        WHERE billets.category_id = ?
        ORDER BY billets.date DESC', [$id]);
    }
}
