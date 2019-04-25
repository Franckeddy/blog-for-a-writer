<?php

namespace app\Table;

use Core\Table\Table;

class CommentTable extends Table
{
    protected $table = 'comments';

    public function showComments($comments_id): array
    {
        return $this->query('
        SELECT comments.id, comments.username, comments.content, comments.created, comments.email as comment
        FROM comments 
        WHERE comments.ref_id = ? 
        ORDER BY comments.created DESC', [$comments_id]);
    }

    public function findAll($ref_id)
    {
        return $this->query('
            SELECT *
            FROM comments
            WHERE ref_id = :ref_id
            ORDER BY created DESC', $ref_id);
        $q->execute(['ref_id' => $ref_id]);
        $comments = $q->fetchAll();

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
}
