<?php

namespace Core\HTML;

/**
 * Class Form
 * Permet de générer un formulaire
 * @package Core\HTML
 */
class Form
{
    /**
     * Données utilisées par le formulaire
     * @var array
     */
    private $data;

    /**
     * string Tag utilisé pour entourer les champs
     * @var string
     */
    private $surround = 'p';

    /**
     * Données utilisées par le formulaire
     * @param array $data
     */
    public function __construct($data = array())
        {
            $this->data = $data;
        }

    /**
     * @param $html
     * @return string
     */
    protected function surround($html)
        {
            return "<{$this->surround}>{$html}</{$this->surround}>";
        }

    /**
     * Index de la valeur à recupérer
     * @param $index
     * @return mixed|null
     */
    protected function getValue($index)
        {
            if (is_object($this->data))
            {
                return $this->data->$index;
            }
            return isset($this->data[$index]) ? $this->data[$index] : null;
        }

    /**
     * @return string
     */
    public function submit()
        {
            return $this->surround('<button type="submit">Envoyer</button>');
        }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type="' .$type. '" name="' . $name . '" value="' . $this->getValue($name) . '">');
    }
}