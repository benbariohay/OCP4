<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

    <section>

        <div id="homeimg">
            <!-- <img src="public/images/alaska.jpg" alt="Alaska" id="main-img"> -->
            <img src="public/images/alaska_smalldevices.jpg" alt="Alaska" id="small-device-img">
            <div id="title">
                <h1>Billet simple pour l'Alaska</h1>
                <p>Jean Forteroche</p>
            </div>
        </div>
            
    </section>
     
	<?php
    while ($data = $posts->fetch())
    {
    ?>
    <div class="chapter-block">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
        </h3>
         
        <div class="content-block">
             <?= $data['content'] ?> 
        </div>

        <p><a href="index.php?action=post&amp;id=<?=$data['id']?>" class="front-link">Voir le chapitre</a></p>    
    </div>
    <?php
    } 
    $posts->closeCursor();
    ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>