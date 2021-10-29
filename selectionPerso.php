<?php

    spl_autoload_register(function($className){
        require $className.'.php';
    });

    $dataManager= new DataManager(BdManager::getMysqlConnection());
    $data = $dataManager->getAllData();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mystyle.css">
        <title>Versus</title>
    </head>
    <body>
        <div id='Titre'>Choisis qui tu veux taper</div>

        <!-- Phase de sélection du joueur-->
        <div>
            <?php $player=$dataManager->showName($_GET['idPlayer'])?>
            <p>Joueur sélectionné : <?php echo($player)?></p>
            <?php echo('<a href=supprimer.php?id='.$_GET["idPlayer"].'>Supprimer</a>');?>
            <p>Qui taper ?</p>
        </div>

        <!-- Phase de sélection de l'adversaire-->
        <div id="ListePerso">
            <?php $dataManager->showAllEnnemies($data); ?>
        </div>
        <!-- 
            APRES
            si un des joueurs est magicien, afficher un bouton pour le sort "endormir"
            à la saisie des joueurs, vérifier la classe, si classe = magicien
            faire appel à une fonction qui affiche un bouton sort ==> voir Disabled en html
        -->
    </body>
</html>