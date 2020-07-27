<?php ob_start(); 

$back_title = "Publier un chapitre"; ?>

    <nav>
        <ul>
        <li><a id="current" href="index.php?action=#">Publier un chapitre</a></li>
			<li><a href="index.php?action=chapters">Chapitres</a></li>
			<li><a href="index.php?action=alertlist">Commentaires signalés</a></li>
        </ul>
    </nav>

    <div>
        <textarea></textarea>
    </div>

<?php $back_content = ob_get_clean(); ?>

<?php require('back_template.php'); ?>