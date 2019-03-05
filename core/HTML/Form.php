<?php

namespace Core\HTML;

class Form
{
        private $data;
        private $surround = 'p';

        public function __construct($data = array())
        {
            $this->data = $data;
        }

        protected function surround($html)
        {
            return "<{$this->surround}>{$html}</{$this->surround}>";
        }

        protected function getValue($index)
        {
            return isset($this->data[$index]) ? $this->data[$index] : null;
        }



        public function submit()
        {
            return $this->surround('<button type="submit">Envoyer</button>');
        }
}