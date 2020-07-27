<?php ob_start(); 

$back_title = "Publier un chapitre"; 

if(isset($_POST['submit_post']))
    {
        $titlenewpost = htmlspecialchars($_POST['title']);
        $contentnewpost = $_POST['content'];

        if(!empty($contentnewpost) AND !empty($titlenewpost))
        {
            CreatePost($_POST['title'], $_POST['content']);
            $confirmation = 'Chapitre ajouté !';
                
        }
        else{
            $errors = 'Tous les champs doivent être remplis !';
        }
    }
?>

    <h1 id="create-title">Publier un chapitre</h1>

    <?php
        if (isset($errors)) {
            echo '<div class="form-errors" id="tinyform-errors"><p>' . $errors . '</p></div>';
        }
        elseif (isset($confirmation)) {
            echo '<div class="form-confirmation" id="tinyform-errors"><p>' . $confirmation . '</p></div>';
        }
    ?>

    <div id="tinymce-form">
        <form method="post" class="tinymce"> <!--action="index.php?action=createpost"-->
            <div id="create-title-block">
                <label for="create-title-input">Titre du chapitre</label>
                <input type="text" id="create-title-input" name="title" />
            </div>
            <div id="create-content-block">
                <label for="content">Contenu du chapitre</label><br />
                <textarea id="content" name="content"></textarea>
            </div>
            <div id="create-submit-btn">
                <input type="submit" value="Publier le chapitre" name="submit_post" />
            </div>
        </form>
    </div>
        

<?php $back_content = ob_get_clean(); ?>

<?php require('back_template.php'); ?>