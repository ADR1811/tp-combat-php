<?php
spl_autoload_register(function($className){
    require $className.'.php';
});
$dataManager= new DataManager(BdManager::getMysqlConnection());
$dataManager->removePerso();
header('Location: ./index.php');