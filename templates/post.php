<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<div class="ui container">
    <h1 class="ui header">Le super blog de l'AVBN !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="ui segment">
        <h3 class="ui header">
            <?= htmlspecialchars($post->title) ?>
            <div class="sub header">le <?= $post->french_creation_date ?></div>
        </h3>

        <p><?= nl2br(htmlspecialchars($post->content)) ?></p>
    </div>

    <h2 class="ui dividing header">Commentaires</h2>

    <form class="ui form" action="index.php?action=addComment&id=<?= $post->identifier ?>" method="post">
        <div class="field">
            <label for="author">Auteur</label>
            <input type="text" id="author" name="author" required />
        </div>
        <div class="field">
            <label for="comment">Commentaire</label>
            <textarea id="comment" name="comment" required></textarea>
        </div>
        <button class="ui primary button" type="submit">Envoyer</button>
    </form>

    <div class="ui comments">
        <?php
        foreach ($comments as $comment) {
        ?>
            <div class="comment">
                <div class="content">
                    <a class="author"><?= htmlspecialchars($comment->author) ?></a>
                    <div class="metadata">
                        <span class="date">le <?= $comment->frenchCreationDate ?></span>
                    </div>
                    <div class="text">
                        <?= nl2br(htmlspecialchars($comment->comment)) ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>