<?php
// index.php

require_once('src/controllers/add_comment.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/modify_comment.php');

use Application\Controller\ModifyCommentController;

$postController = new PostController();
$commentController = new CommentController();
$homepageController = new HomepageController();
$modifyCommentController = new ModifyCommentController();

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];


                $postController->post($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                $commentController->addComment($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'modifyComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $postId = $_GET['postId'];

                $modifyCommentController->modifyComment($identifier, $_POST, $postId);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } else {
            require('./templates/error.php');
        }
    } else {

        $homepageController->homepage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
