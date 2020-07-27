<?php ob_start(); 

$log_title = "Déconnexion - Un billet pour l'Alaska"; ?>

    <div id="logout-block">
        <p>Vous avez été déconnecté</p>
        <a href="index.php" class="front-link">Retour à l'accueil</a>
    </div>
    

<?php $log_content = ob_get_clean(); ?>

<?php require('log_template.php'); ?>