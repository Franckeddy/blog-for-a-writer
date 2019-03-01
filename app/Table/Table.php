<?php

namespace App\Table;

use App\App;

class Table
{
    /**
     * @return array|mixed
     */
    public static function All()
    {
        return App::getDb()->query("
                SELECT * 
                FROM " . static::$table . " 
                ", get_called_class());
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function find($id)
    {
        return static::query("
                SELECT * 
                FROM " . static::$table . " 
                WHERE id = ? ", [$id], true);
    }

    /**
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return array|mixed
     */
    public static function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return App::getDb()->query($statement, get_called_class(), $one);

        }
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}