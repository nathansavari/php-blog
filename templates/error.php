<?php $title = "Erreur - Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<h1>Oups, une erreur ! <br> La page demandée n'existe pas.</h1>
<a href="/mvc/">Retour au menu</a>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>