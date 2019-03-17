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
        if(empty($this->$key))
        {
            $method = 'get' . ucfirst(strtolower($key));
            $this->$key = $this->$method();
        }
        return $this->$key;
    }
}

/*{
    $methode = 'get' . ucfirst($key);
    $this->$key = $this->$methode();
    return $this->$key;
}*/