<?php

namespace App\Entity;

use Core\Entity\Entity;

/**
 * @property mixed id
 * @property mixed content
 * @property mixed date
 */
class PostEntity extends Entity
{
    public $id;
    public $title;
    public $category_id;
    public $content;

    public function id()
    {
        return $this->id;
    }

    public function title()
    {
        return $this->title;
    }

    public function content()
    {
        return $this->content;
    }

    public function category_id()
    {
        return $this->category_id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return 'index.php?p=posts.show&id=' . $this->id;
    }

    /**
     * @return string
     */
    public function getExtrait()
    {
        $html = '<p>' . substr($this->content, 0, 300) . '...</p>';
        $html .= '<p><a class="btn btn-outline-secondary" href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }

    public function getId()
    {
    }

    public function getTitle()
    {
    }

    public function getCategories()
    {
    }

    public function getCategoriesId()
    {
    }

    public function getCategory_Id()
    {
    }

    public function getContent()
    {
    }
}
