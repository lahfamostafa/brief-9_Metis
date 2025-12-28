<?php
    require_once "../config/db.php";
    require_once "../Activité.php";

    class ActiviteCommande{
        private PDO $pdo;

        public function __construct(){
            $this->pdo = Database::connect();
        }

        public function create(Activite $activite){
            try{
                $sql = "insert into activite(descriptionAc,statut,id_projet) values (:description , :statut , :id_projet)";
                $stm = $this->pdo->prepare($sql);
                return $stm->execute(['description'=>$activite->getDescription(),'statut'=>$activite->getStatut(),'id_projet'=>$activite->getProjetId()]);
            }catch(PDOException $e){
                die ("Error : " . $e->getMessage());
            }
        }

        public function read(){
            return $this->pdo->query("select * from activite")->fetchAll(PDO::FETCH_ASSOC);
        }

        public function readById(int $id){
            $stm = $this->pdo->prepare("select * from activite where id = ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }

        public function update(int $id, string $description ,string $statut ,int $idProjet){
            $stm = $this->pdo->prepare("update activite set description = ? , statut = ? , id_projet = ? where id = ?");
            return $stm->execute([$description , $statut ,$idProjet , $id]);
        }

        public function delete(int $id){
            $stm = $this->pdo->prepare("delete from activite where id = ?");
            return $stm->execute([$id]);
        }
    }
?>