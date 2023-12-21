<?php

require_once('src/model/post.php');
require_once('src/model/comment.php');

use Application\Model\Post\PostRepository;
use Application\Model\Comment\CommentRepository;
use Application\Lib\DatabaseConnection;

class PostController
{
    private $postRepository;
    private $commentRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
        $this->postRepository->database = new DatabaseConnection();
        $this->commentRepository = new CommentRepository();
        $this->commentRepository->database = new DatabaseConnection();
    }

    public function post(string $identifier)
    {
        $post = $this->postRepository->getPost($identifier);
        $comments = $this->commentRepository->getComments($identifier);

        require('templates/post.php');
    }
}
