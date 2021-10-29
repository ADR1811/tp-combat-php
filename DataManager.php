<?php 
    class DataManager
    {
        private $db;

        public function __construct(PDO $db)
        {
            $this->db = $db;
        }

        public function getAllData() : array
        {
            $requete = $this->db->query('SELECT * FROM `personnages`');
            $data = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $data ;
        }
        
        public function getData(int $id) : array
        {
            
            $requete = $this->db->prepare('SELECT * FROM `personnages` WHERE id=:id');
            $requete->execute(array(
                'id'=>$id
            ));
            $data = $requete->fetch(PDO::FETCH_ASSOC);
            return $data;
        }




        public function attaque($idAttaquant,$idAttaqué){
            $requete = $this->db->prepare('SELECT * FROM `personnages` WHERE id=:id');
            $requete->execute(array(
                'id'=>$idAttaquant
            ));
            $statAttaquant = $requete->fetch(PDO::FETCH_ASSOC);

            $requete = $this->db->prepare('SELECT * FROM `personnages` WHERE id=:id');
            $requete->execute(array(
                'id'=>$idAttaqué
            ));

            $statAttaqué = $requete->fetch(PDO::FETCH_ASSOC);

            var_dump($statAttaquant);
            var_dump($statAttaqué);
            $pvrestant = $statAttaqué['pv'] - $statAttaquant['attaque'] + $statAttaqué['def'] ;
            var_dump($pvrestant);
            

            $requete = $this->db->prepare('UPDATE personnages SET pv='.$pvrestant.' WHERE ID =:id ');
            $requete->execute(array(
                'id'=>$idAttaqué
            ));
            
            
        }


        public function showAllPerso(array $data): void
        {
            foreach  ($data as $perso) {
                
                if(empty($_GET['idPlayer'])==false && $_GET['idPlayer']!= $perso['id'] || empty($_GET['idPlayer'])==True )
                {
                echo('<a href ="selectionPerso.php?idPlayer='.$perso['id'].'" class="lignePerso">'
                ."<div>".$perso['nomPersonnage']."</div>"
                
                ."<div>".$perso['classePersonnage']."</div>"
                
                ."<div>".$perso['pv']."</div>"
                
                ."<div>".$perso['attaque']."</div>"
                
                ."<div>".$perso['def']."</div>"
                .'</a>');
                }
                
            }
        }
            /*
                Ici 
                Récupèrer les personnages par leur id
                Stocker chaque personnage dans deux variables différentes
                Actualiser les valeurs de PV par rapport aux attaques/défences
                Pour set les valeurs en bdd ===> $_POST (se renseigner)
                Rediriger vers la page index pour afficher les nouvelles données dans le tableau
            */
        public function showAllEnnemies(array $data): void
        {
            foreach  ($data as $perso) {
                
                if(empty($_GET['idPlayer'])==false && $_GET['idPlayer']!= $perso['id'] || empty($_GET['idPlayer'])==True )
                {
                    // Ici trouver la bonne syntaxe pour appeler la méthode fight avec les deux paramètres
                    echo('<a href ="fight.php?idPlayer='.$_GET['idPlayer'].'&idEnemy='.$perso['id'].'" class="lignePerso">'

                    ."<div>".$perso['nomPersonnage']."</div>"
                
                    ."<div>".$perso['classePersonnage']."</div>"
                    
                    ."<div>".$perso['pv']."</div>"
                    
                    ."<div>".$perso['attaque']."</div>"
                    
                    ."<div>".$perso['def']."</div>"
                    
                    .'</a>');
                    
                    }
                
            }
        }

        public function showName(int $id) : string
        {
            $requete = $this->db->prepare('SELECT `nomPersonnage` FROM `personnages` WHERE id=:id');
            $requete->execute(array(
                'id'=>$id
            ));
            $data = $requete->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($data[0]);
            return $data[0]['nomPersonnage'];
        }

        public function addPerso(array $data) : void 
        {
            $insert = "INSERT INTO personnages (nomPersonnage, classePersonnage, pv, def, attaque) VALUES (:Pseudo, :classePersonnage, :pv, :def, :attaque)";
            $requete = $this->db->prepare($insert);
            $requete->execute($data);
        }

        public function removePerso():void 
        {
            $requete = $this->db->prepare('DELETE FROM personnages WHERE id=:id');
            $requete->execute(array(
                'id'=>$_GET['id']
            ));
        }
    }