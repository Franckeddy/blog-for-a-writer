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
    public function __construct($data = [])
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
     * @return string
     */
    protected function getValue($index)
    {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return $this->data[$index] ?? null;
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
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = $options['type'] ?? 'text';
        return $this->surround(
            '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }

    public function select($name, $label, $options)
    {
        $input = '<select class="form-control" name="' . $name . '">';
        foreach ($options as $k => $v) {
            $attributes = '';
            if ($k === $this->getValue($name)) {
                $attributes = 'selected';
            }
            $input .= "<option value='$k' $attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($input);
    }
}
