<?php $title = "Modify Comment"; ?>

<?php ob_start(); ?>
<div class="ui container">
    <h1 class="ui header">Modify Comment</h1>
    <form class="ui form" method="POST" action="index.php?action=modifyComment&id=<?= $_GET['id'] ?>&postId=<?= $_GET['postId'] ?>" method="post">
        <div class="field">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" cols="50"><?= htmlspecialchars($comment->content); ?></textarea>
        </div>
        <input type="hidden" name="comment_id" value="<?= $comment->id; ?>">
        <button class="ui button" type="submit">Save</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>