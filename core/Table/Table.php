<?php

namespace Core\Table;

use Core\Database\Database;

class Table
{
    protected $table;
    protected $db;

    /**
     * Table constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
        if ($this->table === null) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->query( "SELECT * FROM {$this->table} WHERE id = ?", [ $id ], true );
    }

    /**
     * @param $id
     * @param $fields
     * @return mixed
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * @param $fields
     * @return mixed
     */
    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function extract($key, $value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    /**
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return mixed
     */
    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }

//    Commentaires

    /**
     * commentaires
     * @var
     */
    private $pdo;

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
        if (empty($_POST['username'])) {
            $errors['username'] = $this->options['username_error'];
        }
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = $this->options['email_error'];
        };
        if (empty($_POST['content'])) {
            $errors['content'] = $this->options['content_error'];
        }
        if (count($errors) > 0) {
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
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'content' => $_POST['content'],
            'ref' => $ref,
            'ref_id' => $ref_id,
            'created' => date('Y-m-d H:i:s')
        ];
        return $q->execute($date);
    }
}
