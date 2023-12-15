<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<div class="ui container">
    <h1 class="ui header">Le super blog de l'AVBN !</h1>
    <p>Derniers billets du blog :</p>

    <div class="ui divided items">
        <?php
        foreach ($posts as $post) {
        ?>
            <div class="item">
                <section class="content">
                    <h3 class="header"><?= htmlspecialchars($post->title); ?></h3>
                    <div class="meta">
                        <span>le <?= $post->french_creation_date; ?></span>
                    </div>
                    <div class="description">
                        <p><?= nl2br(htmlspecialchars($post->content)); ?></p>
                    </div>
                    <div class="ui extra">
                        <em><a href="index.php?action=post&id=<?= urlencode($post->identifier) ?>">Commentaires</a></em>
                    </div>
                </section>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>