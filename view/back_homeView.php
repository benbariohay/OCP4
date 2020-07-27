<?php ob_start(); 

$back_title = "Tableau de bord"; 
?>

<h2 id="welcome">Bienvenue dans votre espace d'administration</h2>

<?php $back_content = ob_get_clean(); ?>

<?php require('back_template.php'); ?>