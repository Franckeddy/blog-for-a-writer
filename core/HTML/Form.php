<?php

namespace Core\HTML;

class Form
{
        private $data;
        private $surround = 'p';

    /**
     * Form constructor.
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