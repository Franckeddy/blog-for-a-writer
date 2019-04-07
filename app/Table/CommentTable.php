<?php

namespace app\Table;

use Core\Table\Table;

class CommentTable extends Table
{
    protected $table = 'comments';

    public function getComments($postId)
    {
        return $this->query('
        SELECT comments.id, comments.username, comments.content, comments.created 
        FROM comments 
        WHERE comments.ref_id = ? 
        ORDER BY comments.created DESC LIMIT 0, 5');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($id, $username, $content)
    {
        return $this->query('
        INSERT INTO comments(comments.id, comments.username, comments.content, comments.created) 
        VALUES($id, $username, $content, NOW())');
        $affectedLines = $comments->execute(array($ref_id, $username, $content));

        return $affectedLines;
    }

    public function editComment($CommentId)
    {
        $req = $db->prepare('SELECT comments.id, comments.ref_id, comments.username, comments.content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE id = ?');
        $req->execute(array($CommentId));
        $comment = $req->fetch();

        return $comment;
    }

    private $pdo;
    private $default = [
        'username_error' => "Vous n'avez pas rentré de pseudo",
        'email_error' => "Votre email n'est pas valide",
        'content_error' => "Vous n'avez pas mis de message",
        'parent_error' => "Vous essazer de répondre à un commentaire qui n'existe pas"
    ];
    public $errors = array();
    public $count = 0;

    /**
     * Permet d'initialiser le module commentaire
     * @param PDO $pdo instance d'une connection mysql via pdo
     * @param array $options
     */
    public function __construct($pdo, $options = [])
    {
        $this->pdo = $pdo;
        $this->options = array_merge($this->default, $options);
    }

    /**
     * Permet de récupérer les derniers commentaires d'un sujet
     * @param string $ref
     * @param integer $ref_id
     * @return array
     */
    public function findAll($ref, $ref_id)
    {
        return $this->prepare('
            SELECT *
            FROM comments
            WHERE ref_id = :ref_id AND ref = :ref
            ORDER BY created DESC');
        $q->execute(['ref' => $ref, 'ref_id' => $ref_id]);
        return $q->fetchAll();
        $this->count = count($comments);

        // Filtrage des réponses
        $replies = [];
        foreach ($comments as $k => $comment) {
            if ($comment->parent_id) {
                $replies[$comment->parent_id][] = $comment;
                unset($comments[$k]);
            }
        }
        foreach ($comments as $k => $comment) {
            if (isset($replies[$comment->id])) {
                $r = $replies[$comment->id];
                usort($r, [$this, 'sortReplies']);
                $comments[$k]->replies = $r;
            } else {
                $comments[$k]->replies = [];
            }
        }
        return $comments;
    }

    public function sortReplies($a, $b)
    {
        $atime = strtotime($a->created);
        $btime = strtotime($b->created);
        return $btime > $atime ? -1 : 1;
    }

    /**
     * Permet de sauvegarder un commentaire
     * @param string $ref
     * @param integer $ref_id
     * @return boolean
     */
    public function save($ref, $ref_id)
    {
        $errors = [];
        if (empty($_POST['username'])) {
            $errors['username'] = $this->options['username_error'];
        }
        if (empty($_POST['email']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = $this->options['email_error'];
        }
        if (empty($_POST['content'])) {
            $errors['content'] = $this->options['content_error'];
        }
        if (count($errors) > 0) {
            $this->errors = $errors;
            return false;
        }
        if (!empty($_POST['parent_id'])) {
            $q = $this->pdo->prepare('
                SELECT id
                FROM comments
                WHERE ref = :ref AND ref_id = :ref_id AND id = :id AND parent_id = 0');
            $q->execute([
                'ref' => $ref,
                'ref_id' => $ref_id,
                'id' => $_POST['parent_id']
            ]);
            if ($q->rowCount() <= 0) {
                $this->errors['parent'] = $this->options['parent_error'];
                return false;
            }
        }
        $q = $this->pdo->prepare('
            INSERT INTO comments SET
            username = :username,
            email    = :email,
            content  = :content,
            ref_id   = :ref_id,
            ref      = :ref,
            created  = :created,
            parent_id= :parent_id');
        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'content' => $_POST['content'],
            'parent_id' => $_POST['parent_id'],
            'ref_id' => $ref_id,
            'ref' => $ref,
            'created' => date('Y-m-d H:i:s')
        ];
        return $q->execute($data);
    }

    private function prepare(string $string)
    {
    }
}
