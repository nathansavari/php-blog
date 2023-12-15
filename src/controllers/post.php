<?php
// src/controllers/post.php

require_once('src/model/post.php');
require_once('src/model/comment.php');

function post(string $identifier)
{
    $postRepository = new PostRepository();
    $postRepository->database = new DatabaseConnection();
    $post = $postRepository->getPost($identifier);
    $commentRepository = new CommentRepository();
    $commentRepository->database = new DatabaseConnection();
    $comments = $commentRepository->getComments($identifier);

    require('templates/post.php');
}
