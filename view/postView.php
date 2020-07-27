<?php ob_start();

 $title = htmlspecialchars($post['title']); ?>

 
<?php
if(isset($_POST['submit_comment']))
    {
        $authorcomment = htmlspecialchars($_POST['author']);
        $contentcomment = $_POST['comment'];

        if(!empty($contentcomment) AND !empty($authorcomment))
        {
            PostComment($_GET['id'], $_POST['author'], $_POST['comment']);
            header('Location: index.php?action=post&id=' . $_GET['id']);
        }
        else{
            $errors = 'Tous les champs doivent être remplis !';
        }
    }
?>

    <div class="banner">
        <img src="public/images/alaska-banner.jpg" alt="">
    </div>
        
    <p><a href="index.php" class="front-link" id="frontlink">Retour à la liste des chapitres</a></p>

    <div class="chapter-block">

        <h3>
            <?= htmlspecialchars($post['title']) ?>
        </h3>
        
        <div class="content-block-post">
            <?= $post['content'] ?> 
        </div>

    </div>

    <div id="add-viewComment">
        <h2>Commentaires</h2>
        <div id="show-button-block"><button id="show-button">Ajouter un commentaire</button></div>
    </div>

    <div class="regular-form" id="addComment-form">
    <form method="post">  <!--action="index.php?action=postcomment&amp;id=<!= $post['id'] ?>"-->
            <div>
                <label for="author">Pseudo</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" class="submit-btn" name="submit_comment" />
            </div>

            <?php
                if (isset($errors)) {
                    echo '<div class="form-errors"><p>' . $errors . '</p></div>';
                }
            ?>

        </form>
    </div>

    <?php
    while ($comment = $comments->fetch())
    {
        if($comment['alert'] == 0){
    ?>
            <div class="block-comments">
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> <a href="index.php?action=alert&amp;commentid=<?= htmlspecialchars($comment['id'])?>&amp;id=<?= htmlspecialchars($post['id'])?>" class="front-link">Signaler</a></p>
                <div class="separate-line"></div>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            </div>
                
    <?php    
        }
        elseif($comment['alert'] == 1){
    ?>      
            <div class="block-comments">
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> <strong id="reported-com">Commentaire signalé</strong></p>
                <div class="separate-line"></div>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            </div>
    <?php
        }
    }
    ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
