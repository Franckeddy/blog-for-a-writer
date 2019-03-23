<?php

namespace app\Table;

/**
 * @property array options
 */
class Comments
{
    private $pdo;
    private static $options = array(
        'username_error' => 'Vous n\'avez pas renseigner votre Pseudo',
        'email_error' => 'Votre email est incorrect',
        'content_error' => 'Vous n\'avez pas renseigner votre Contenu'
    );
    public $errors = array();

    public function __construct($pdo, $options = [])
    {
        $this->pdo = $pdo;
        $this->options = array_merge($this->options, $options);
    }


}