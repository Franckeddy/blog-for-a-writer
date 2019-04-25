<?php

namespace app\Entity;

use Core\Entity\Entity;

class CommentEntity extends Entity
{
    public $id;
    private $_id;
    private $_username;
    private $_content;
    private $_ref_id;
    private $_created;
    private $_email;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return 'comments/' . $this->id;
    }

    public function id()
    {
        return $this->_id;
    }

    public function username()
    {
        return $this->_username;
    }

    public function content()
    {
        return $this->_content;
    }

    public function ref_id()
    {
        return $this->_ref_id;
    }

    public function created()
    {
        return $this->_created;
    }

    public function email()
    {
        return $this->_email;
    }

    public function setId($id)
    {
//        // On convertit l'argument en nombre entier.
//        // Si c'en était déjà un, rien ne changera.
//        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
//        $id = (int)$id;
//
//        // On vérifie ensuite si ce nombre est bien strictement positif.
//        if ($id > 0) {
//            // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
//            $this->_id = $id;
//        }
    }

    public function setUsername($username)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($username)) {
            $this->_username = $username;
        }
    }

    public function setContent($content)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setRefid($ref_id)
    {
        // On convertit l'argument en nombre entier.
        // Si c'en était déjà un, rien ne changera.
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
        $ref_id = (int)$ref_id;

        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($ref_id > 0) {
            // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
            $this->_ref_id = $ref_id;
        }
    }

    public function setCreated($created)
    {
    }

    public function setEmail($email)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($email)) {
            $this->_email = $email;
        }
    }
}
