<?php
    require_once "../config/db.php";
    require_once "../ProjetCourt.php";
    require_once "../ProjetLong.php";

    class ProjetCommande{
        private PDO $pdo;

        public function __construct(){
            $this->pdo = Database::connect();
        }

        public function create(Projet $Projet){
            try{
                $sql = "insert into Projet(titre,descriptionPr,typeProjet,membreId) values (:titre , :description , :type , :idMembre)";
                $stm = $this->pdo->prepare($sql);
                return $stm->execute(['titre'=>$Projet->getTitre(),'description'=>$Projet->getDescription(),'type'=>$Projet->getType(),'idMembre'=>$Projet->getIdMembre()]);
            }catch(PDOException $e){
                die ("Error : " . $e->getMessage());
            }
        }

        public function read(){
            return $this->pdo->query("select * from Projet")->fetchAll(PDO::FETCH_ASSOC);
        }

        public function readById(int $id){
            $stm = $this->pdo->prepare("select * from Projet where id = ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }

        public function update(int $id, string $titre ,string $description ,string $type ,int $idMembre){
            $stm = $this->pdo->prepare("update Projet set titre = ? , descriptionPr = ? , typeProjet = ? , membreId = ? where id = ?");
            return $stm->execute([$titre , $description ,$type , $idMembre , $id]);
        }

        public function readByMembre($idMembre){
            $stm = $this->pdo->prepare("select * from Projet where membreId = ?");
            $stm->execute([$idMembre]);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete(int $id){
            $stm = $this->pdo->prepare("delete from Projet where id = ?");
            return $stm->execute([$id]);
        }

    }
?>