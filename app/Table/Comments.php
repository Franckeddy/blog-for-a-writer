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

    /**
     * Récuperer les commentaires associés
     * @param $ref
     * @param $ref_id
     * @return mixed
     */
    public function findAll($ref, $ref_id)
    {
        $q = $this->pdo->prepare('
        SELECT * 
        FROM ref_id = :ref_id
        AND ref = :references ORDER BY created DESC 
        ');
        $q->execute(['ref' => $ref, 'ref_id' => $ref_id]);
        return $q->fetchAll();
    }

    /**
     * Sauvegarder de commentaire
     * @param $ref
     * @param $ref_id
     * @return bool
     */
    public function save($ref, $ref_id): bool
    {
        $errors = [];
        if (empty($_POST['username'])){
            $errors['username'] = $this->options['username_error'];
        }
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = $this->options['email_error'];
        };
        if (empty($_POST['content'])) {
            $errors['content'] = $this->options['content_error'];
        }
        if (count($errors) > 0){
            $this->errors = $errors;
            return false;
        }
        $q = $this->pdo->prepare('INSERT INTO comments SET 
        username    = :username,
        email       = :email,
        content     = :content,
        ref         = :ref,
        ref_id      = :ref_id,
        created     = :created');
        $date = [
            'username'  => $_POST['username'],
            'email'     => $_POST['email'],
            'content'   => $_POST['content'],
            'ref'       => $ref,
            'ref_id'    => $ref_id,
            'created'   => date('Y-m-d H:i:s')
        ];
        return $q->execute($date);
    }
}