<?php

namespace Application\Controller;

use Application\Model\Comment\CommentRepository;
use Application\Lib\DatabaseConnection;
use Exception;

require_once('src/model/comment.php');

class ModifyCommentController
{
    public function modifyComment(string $commentId, array $input, string $postId)
    {
        $comment = null;
        if (!empty($input['comment'])) {
            $comment = $input['comment'];
        } else {
            require('templates/commentModification.php');
        }
        $commentRepository = new CommentRepository();
        $commentRepository->database = new DatabaseConnection();
        $success = $commentRepository->modifyComment($commentId, $comment);
        if (!$success) {
            throw new Exception('Impossible de modifier le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
}
