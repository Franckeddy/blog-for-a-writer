<?php

namespace Core\HTML;

class BootstrapForm extends Form
{
    /**
     * string code HTML à entourer
     * @param $html
     * @return string
     */
    public function surround($html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name
     * @param $label string
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = $options['type'] ?? 'text';
        $label = '<label>' . $label . '</label>';
        if ($type === 'textarea') {
            $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">';
        }
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }

    /**
     * @param $name
     * @param $label
     * @param $options
     * @return string
     */
    public function select($name, $label, $options)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        if (isset($name, $label, $options)) {
            foreach ($options as $k => $v) {
                $attributes = '';
                if ($k === $this->getValue($name)) {
                    $attributes = 'selected';
                }
                $input .= "<option value='$k'$attributes>$v</option>";
            }
            $input .= '</select>';
            return $this->surround($label . $input);
        }
    }
}
