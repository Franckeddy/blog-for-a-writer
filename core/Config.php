<?php

namespace Core;


class Config
{
    private $settings;
    private static $_instance; // L'atribut qui stockera l'instance unique

    /**
     * @param $file
     * @return Config
     */
    public static function getInstance($file)
    {
        if (self::$_instance === null)
        {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    /**
     * Config constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->settings = require $file;
    }

    /**
     * Permet d'obtenir la valeur de la configuration
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->settings[$key] ?? null;
    }
}