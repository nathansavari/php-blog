<?php

require_once('src/model/post.php');

use Application\Model\Post\PostRepository;
use Application\Lib\DatabaseConnection;

class HomepageController
{
    public function homepage()
    {
        $postRepository = new PostRepository();
        $postRepository->database = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('templates/homepage.php');
    }
}
