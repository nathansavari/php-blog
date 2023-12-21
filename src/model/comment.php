<?php

namespace Application\Model\Comment;

use Application\Lib\DatabaseConnection;

use PDO;

class Comment
{
    public string $author;
    public string $frenchCreationDate;
    public string $comment;
    public string $identifier;
}

class CommentRepository
{
    public DatabaseConnection $database;
    public function getComments(string $post): array
    {
        $this->commentDbConnect();
        $statement = $this->database->getConnection()->prepare(
            "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
        );
        $statement->execute([$post]);

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->author = $row['author'];
            $comment->frenchCreationDate = $row['french_creation_date'];
            $comment->comment = $row['comment'];
            $comment->identifier = $row['id'];
            $comments[] = $comment;
        }

        return $comments;
    }

    public function createComment(string $post, string $author, string $comment)
    {
        $this->commentDbConnect();
        $statement = $this->database->getConnection()->prepare(
            'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$post, $author, $comment]);

        return ($affectedLines > 0);
    }

    public function modifyComment(string $commentId, string $comment)
    {
        $this->commentDbConnect();
        $statement = $this->database->getConnection()->prepare(
            'UPDATE comments SET comment = ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$comment, $commentId]);

        return ($affectedLines > 0);
    }

    public function commentDbConnect()
    {
        if ($this->database === null) {
            $this->database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        }
    }
}
