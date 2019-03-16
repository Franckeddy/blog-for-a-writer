<?php

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=posts.categories&id=' . $this->id;
    }
}