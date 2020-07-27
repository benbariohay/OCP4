<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link href="https://fonts.googleapis.com/css?family=Lora&=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amiri&=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"/>
        <link rel="icon" href="public/images/favicon.ico" type="image/x-icon"/>

    </head>
        
    <body>

        <?= $content ?>

        <div id="arrow"><i class="fas fa-chevron-circle-up"></i></div>

        <footer>
            <div id="login"><a href="index.php?action=loginview">Authentification</a></div>
        </footer>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="public/js/show_comment.js"></script>
        <script type="text/javascript" src="public/js/up_arrow.js"></script>

    </body>
</html>