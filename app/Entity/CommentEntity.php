<?php

namespace app\Entity;

use Core\Entity\Entity;

class CommentEntity extends Entity
{
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return 'index.php?p=posts.comments&id=' . $this->id;
    }

    public function getId()
    {
    }

    public function getUsername()
    {
    }

    public function getContent()
    {
    }

    public function getRefId()
    {
    }

    public function getCreated()
    {
    }

    public function getRef()
    {
    }

    public function geEmail()
    {
    }
}
