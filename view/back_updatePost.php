<?php ob_start(); 

$back_title = "Modifier un chapitre";

if(isset($_POST['edit_post']))
    {
        $titlenewpost = htmlspecialchars($_POST['title']);
        $contentnewpost = $_POST['content'];

        if(!empty($contentnewpost) AND !empty($titlenewpost))
        {
            UpdatePost($_POST['title'], $_POST['content'], $_GET['postid']);
            $confirmation = 'Chapitre modifié !';
                
        }
        else{
            $errors = 'Tous les champs doivent être remplis !';
        }
    }
?>

    <h1 id="create-title">Modifier un chapitre</h1>

    <?php
        if (isset($errors)) {
            echo '<div class="form-errors" id="tinyform-errors"><p>' . $errors . '</p></div>';
        }
        elseif (isset($confirmation)) {
            echo '<div class="form-confirmation" id="tinyform-errors"><p>' . $confirmation . '</p></div>';
        }
    ?>

    <div id="tinymce-form">
        <form action="" method="post" class="tinymce"> <!--index.php?action=updatepost&amp;postid=<!= $post['id'] ?>-->
            <div id="create-title-block">
                <label for="title">Titre du chapitre</label><br />
                <input type="text" id="create-title-input" name="title" value=" <?=htmlspecialchars($post['title'])?> " />
            </div>
            <div id="create-content-block">
                <label for="create-content-block">Contenu du chapitre</label><br />
                <textarea id="content" name="content"><?= $post['content'] ?></textarea>
            </div>
            <div id="create-submit-btn">
                <input type="submit" value="Modifier le chapitre" name="edit_post" />
            </div>
        </form>
    </div>

<?php $back_content = ob_get_clean(); ?>

<?php require('back_template.php'); ?>