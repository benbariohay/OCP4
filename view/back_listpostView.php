<?php ob_start(); 

$back_title = "Chapitres"; 
?>

    <?php
    while ($data = $listposts->fetch())
    {
    ?>
    <div class="chapter-block">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
        </h3>
        
        <div>
            <div class="content-block" id="back-content-block">
                <?= nl2br(($data['content'])) ?>
                <br />
            </div>
            <div id="editdeletelinks">
                <a class="front-link delete" href="index.php?action=deletepost&amp;postid=<?=htmlspecialchars($data['id'])?>" onclick=" return confirm('Confirmez la suppression du chapitre ?');">Supprimer</a> 
                <a class="front-link" href="index.php?action=updatedir&amp;postid=<?=htmlspecialchars($data['id'])?>">Modifier</a>
            </div>
        </div>
            
    </div>
    <?php
    } // Fin de la boucle des billets
    $listposts->closeCursor();
    ?>

<?php $back_content = ob_get_clean(); ?>

<?php require('back_template.php'); ?>