<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{
    public $dateFr;

    public function __construct()
    {
        $this->dateFr = $this->dateFr();
    }

    private function dateFr()
    {
        $d = $this->date;
        return substr( $d, 8, 2 ) . '/' . substr( $d, 5, 2 ) . '/' . substr( $d, 0, 4 ) . substr( $d, 10 );
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
        $html .= '<p><a class="btn btn-outline-secondary" href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}