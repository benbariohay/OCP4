<?php ob_start(); 

$log_title = "Authentification - Un billet pour l'Alaska"; ?>

<?php
if(isset($_POST['submit_connect']))
    {
        $pseudoconnect = htmlspecialchars($_POST['pseudo']);
        $passconnect = $_POST['pass'];

        if(!empty($passconnect) AND !empty($pseudoconnect))
        {
            LogIn($_POST['pseudo'], $_POST['pass']);
        }
        else{
            $errors = 'Tous les champs doivent être remplis !';
        }
    }
?>

    <div class="regular-form login-form">
        <form method="post" id="login-form"> <!-- action="index.php?action=login" -->
            <div>
                <label for="pseudo">Pseudo</label><br />
                <input type="text" id="pseudo" name="pseudo" />
            </div>
            <div>
                <label for="pass">Mot de Passe</label><br />
                <input type="password" id="pass" name="pass" />
            </div>
            <div>
                <input type="submit" name="submit_connect" />
            </div>
            
            <?php
                if (isset($errors)) {
                    echo '<div class="form-errors"><p>' . $errors . '</p></div>';
                }
                elseif (isset($_SESSION['errors'])) {
                    foreach($_SESSION['errors'] as $error): ?>
                        <div class="form-errors">
                            <p><?php echo $error ?></p>
                        </div>
                    <?php endforeach; 
                }
            ?>

        </form>
    </div>
 
    <a href="index.php" class="front-link" id="frontlink">Retour à l'accueil</a>
   

<?php $log_content = ob_get_clean(); ?>

<?php require('log_template.php'); ?>