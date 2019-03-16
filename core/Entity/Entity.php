<?php

namespace Core\Entity;

class Entity
{
    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        $methode = 'get' . ucfirst($key);
        $this->$key = $this->$methode();
        return $this->$key;
    }
}