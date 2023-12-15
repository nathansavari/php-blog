<?php
// controllers/homepage.php

require_once('src/model/post.php');

function homepage()
{
    $postRepository = new PostRepository();
    $postRepository->database = new DatabaseConnection();
    $posts = $postRepository->getPosts();

    require('templates/homepage.php');
}
