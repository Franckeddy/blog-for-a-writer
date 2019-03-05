<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{

    public function getUrl()
    {
        return 'index.php?p=posts.show&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->content, 0, 300) . '...</p>';
        $html .= '<p><a class="btn btn-outline-secondary" href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}