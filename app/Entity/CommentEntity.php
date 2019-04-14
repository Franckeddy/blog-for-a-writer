<?php

namespace app\Entity;

use Core\Entity\Entity;

class CommentEntity extends Entity
{
    public $id;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return 'index.php?p=posts.comments&id=' . $this->id;
    }
}
