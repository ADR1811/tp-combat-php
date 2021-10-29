<?php

class BdManager
{
    public static function getMysqlConnection(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=tp-combat','root','');
            return $db;
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
}