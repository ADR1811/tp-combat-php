<?php

    spl_autoload_register(function($className){
        require $className.'.php';
    });

    $dataManager= new DataManager(BdManager::getMysqlConnection());
    $data = $dataManager->getAllData();

?>
    
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mystyle.css">
        <title>Versus</title>
    </head>
    <body>  
        <!-- Phase de création des persos -->
        <!--
            Créer un formulaire ==> <form>
            Avec 2 boutons radios : 1 = Guerrier, 2 = Magicien OU une liste déroulante
            Un label "Nom du personnage"
            Un champ de saisi ==> input required
            Un bouton "Enregistrer" pour indiquer la fin de la saisie
            Se renseigner $_POST pour set les données OU faire une fonction et créer une requête en dure
                avec INSERT INTO 'personnage' 
        -->
        <div id='Titre'>Sélectionne ton personnage</div>
        
        <div id="ListePerso">
            <?php 
                $dataManager->showAllPerso($data);
                
            ?>
        </div>
        <form method="post" action="creation.php">
            <p id='Titre2'>Création de personnage</p>
                <label for="Pseudo">Entrez un pseudo</label> : <input type="text" name="Pseudo" placeholder="Ex: Pouet" size="20" minlength="4" maxlength="20" required/>
            <p>
                Choisissez une classe :<br />
                <input type="radio" name="classePersonnage" value="Guerrier" id="Guerrier" checked="checked"/> <label for="guerrier">Guerrier</label><br />
                <input type="radio" name="classePersonnage" value="Magicien" id="Magicien" /> <label for="magicien">Magicien</label><br />
                <p></p>
                <input type="submit" value="Créer"/>
                </p>
        </form>
    </body>
</html>