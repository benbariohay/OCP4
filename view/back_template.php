<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title><?= $back_title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <script src="https://cdn.tiny.cloud/1/3jah9lwuyj05ex4ea5gaf7rcg3igbaudxqpb875ln4hj9ai8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link href="https://fonts.googleapis.com/css?family=Amiri&=swap" rel="stylesheet">
        <link rel="icon" href="public/images/favicon.ico" type="image/x-icon"/>

    </head>
        
    <body>

        <header>
            <div id="logout-btn">
                <a href="index.php?action=logout">Déconnexion</a>
            </div>
            <div id="menuToggle">

                <input type="checkbox" id="checkbox" />

                <span></span>
                <span></span>
                <span></span>	

                <ul id="menu">
                    <li><a id="current" href="index.php?action=writepost">Publier un chapitre</a></li>
                    <li><a href="index.php?action=chapters">Chapitres</a></li>
                    <li><a href="index.php?action=alertlist">Commentaires signalés</a></li>
                    <li><a href="index.php">Retour à l'accueil</a></li>
                </ul>
            </div>
                
        </header>

        <?= $back_content ?>

        <script>
            tinymce.init({
                selector: 'textarea',
                // plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
            });
        </script>
    </body>

    <!-- <script type="text/javascript" src="public/js/confirm.js"></script> -->

</html>