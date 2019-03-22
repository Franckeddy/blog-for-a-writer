<?php

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    private $id;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return 'index.php?p=posts.categories&id=' . $this->id;
    }
}