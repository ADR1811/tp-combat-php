<?php
    spl_autoload_register(function($className){
        require $className.'.php';
    });

    echo $_POST['Pseudo'];
    echo $_POST['classePersonnage'];
    if($_POST['classePersonnage']=="Guerrier")
    {
        $attaque=rand(20,40);
        $pv=100;
        $def=rand(10,19);
    }
    elseif ($_POST['classePersonnage']=="Magicien")
    {
        $attaque=rand(5,10);
        $pv=100;
        $def=0;
    }
    else
    {
        $attaque=rand(0,100);
        $pv=rand(1,1000);
        $def=rand(0,100);
    }
    $dataManager= new DataManager(BdManager::getMysqlConnection());
    $data = [
        'Pseudo'=>$_POST['Pseudo'],
        'classePersonnage'=>$_POST['classePersonnage'],
        'pv'=>$pv,
        'def'=>$def,
        'attaque'=>$attaque,
    ];
    $dataManager->addPerso($data);

    header('Location: ./index.php');
?>