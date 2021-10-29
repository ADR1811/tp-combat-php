<?php
    class FightManager
    {
        private $db;
        private $dataManager;
        private $idPlayer;
        private $idEnemy;
        public function __construct(PDO $db,$idPlayer,$idEnemy)
        {
            $this->db = $db;
            $this->idPlayer = $idPlayer;
            $this->idEnemy = $idEnemy;
            $this->dataManager = new DataManager($this->db);
        }

        
        
        public function showPerso(){
            $perso1=$this->dataManager->getData($this->idPlayer);
            $perso2=$this->dataManager->getData($this->idEnemy);
            // var_dump($perso1);
            // var_dump($perso2);
            echo(
                '<div id="LesPerso">
                    <div id="Perso1">
                        <div>Vos Stats</div>
                        <div> '.$perso1['nomPersonnage'].'</div>
                        <div> PV: '.$perso1['pv'].'</div>
                        <div> ATK: '.$perso1['attaque'].'</div>
                        <div> DEF: '.$perso1['def'].'</div>
                        <form method="post" action=hit.php?idCible='.$this->idEnemy.'&idAttaquant='.$this->idPlayer.'>
                            <input type="submit" name="action" value="Hit""/>
                        </form>
                    </div>

                    <div id="Perso2">
                        <div>Stats adverse</div>
                        <div> '.$perso2['nomPersonnage'].'</div>
                        <div> PV: '.$perso2['pv'].'</div>
                        <div> ATK: '.$perso2['attaque'].'</div>
                        <div> DEF: '.$perso2['def'].'</div>
                    </div>


                    
                </div>'
            );
        }
        
    }
?>
