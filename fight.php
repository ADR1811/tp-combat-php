<?php

    spl_autoload_register(function($className){
        require $className.'.php';
    });

    $dataManager= new DataManager(BdManager::getMysqlConnection());
    $data = $dataManager->getAllData();

    $fight = new FightManager(BdManager::getMysqlConnection(),$_GET['idPlayer'],$_GET['idEnemy']);

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
        <div id='Titre'></div>

        <div id="Combat">
            <?php 
                $fight->showPerso();
            ?>
        </div>
    </body>
</html>