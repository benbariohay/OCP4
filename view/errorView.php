<?php ob_start(); 

$log_title = "Erreur - Un billet pour l'Alaska"; ?>

    <?php 
    if ($errorMessage === 'limitedaccess') {
    ?>   
        <div id="exception">
            <p>Cette page est en accès limité, merci de vous connecter.</p>
            <a href="index.php?action=loginview" class="front-link">Se connecter</a>
            <a href="index.php" class="front-link">Retour à l'accueil</a>
        </div>
    <?php    
    } 
    elseif($errorMessage === 'managecom') {
    ?>
        <div id="exception">
            <p>Vous pouvez gérer un commentaire dans votre espace 'Commentaires signalés'</p>
            <a href="index.php?action=loginview" class="front-link">Espace d'administration</a>
        </div>
    <?php  
    }
    elseif($errorMessage === 'managepost') {
    ?>
        <div id="exception">
            <p>Vous pouvez gérer un chapitre dans votre espace 'Chapitres'</p>
            <a href="index.php?action=loginview" class="front-link">Espace d'administration</a>
        </div>
    <?php
    }
    elseif($errorMessage === 'wrongidpost') {
    ?>
        <div id="exception">
            <p>Mauvais identifiant de chapitre envoyé.</p>
            <a href="index.php" class="front-link">Retour à l'accueil</a>
        </div>
    <?php
    }
    ?>  
    

<?php $log_content = ob_get_clean(); ?>

<?php require('log_template.php'); ?>