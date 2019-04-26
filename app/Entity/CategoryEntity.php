<?php

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public $id;
    public $title;

    /**
     * @return string
     */
    public function getUrl()
    {
        return 'index.php?p=posts.categories&id=' . $this->id;
    }

    public function title()
    {
        return $this->title;
    }

    public function setId($id)
    {
        // On convertit l'argument en nombre entier.
        // Si c'en était déjà un, rien ne changera.
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
        $id = (int) $id;

        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($id > 0) {
            // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
            $this->id = $id;
        }
    }

    public function setTitle($title)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($title)) {
            $this->title = $title;
        }
    }
}
