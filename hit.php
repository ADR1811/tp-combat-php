<?php
    spl_autoload_register(function($className){
        require $className.'.php';
    });
    $dataManager= new DataManager(BdManager::getMysqlConnection());
    if ($_POST['action']=='Hit'){
        $dataManager->attaque($_GET['idAttaquant'],$_GET['idCible']); #attaquant attaqué
    }
    elseif ($_POST['action']=='Sleep'){
        echo("sleep");
    }
// // $dataManager->removePerso();
header('Location: ./index.php');