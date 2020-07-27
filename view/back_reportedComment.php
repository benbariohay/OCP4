<?php ob_start(); 

$back_title = "Gérer les commentaires signalés"; 
?>

    <h1 id="create-title">Commentaires signalés</h1>

    <?php
    if($alertlist->rowCount() > 0) {
        while ($reportedcomment = $alertlist->fetch()) {
    ?>
        <div class="block-comments">
            <p><strong><?= htmlspecialchars($reportedcomment['author']) ?></strong> le <?= $reportedcomment['comment_date_fr'] ?> </p>
            <div class="separate-line"></div>
            <p><?= nl2br(htmlspecialchars($reportedcomment['comment'])) ?></p>
            <a class="front-link deletecom" href="index.php?action=deletecom&amp;commentid=<?= $reportedcomment['id'] ?>" onclick=" return confirm('Confirmez la suppression du commentaire ?');">Supprimer</a> 
            <a class="front-link" href="index.php?action=validatecom&amp;commentid=<?= $reportedcomment['id'] ?>" onclick=" return confirm('Confirmez la validation du commentaire ?');">Valider</a>
        </div>
    <?php
    } // Fin de la boucle des billets
    $alertlist->closeCursor();
    
    } else {
    ?>    
         <p id="noreportedcom">Aucun commentaire signalé</p> 
    <?php    
    }
    ?>
    
    

<?php $back_content = ob_get_clean(); ?>

<?php require('back_template.php'); ?>