<?php
    require_once "../config/db.php";
    require_once "../Membre.php";

    class MembreCommande{
        private PDO $pdo;

        public function __construct(){
            $this->pdo = Database::connect();
        }

        public function create(Membre $membre){
            try{
                $sql = "insert into membre(nom,email) values (:nom , :email)";
                $stm = $this->pdo->prepare($sql);
                var_dump($membre->getNom(), $membre->getEmail());
                return $stm->execute(['nom'=>$membre->getNom(),'email'=>$membre->getEmail()]);
            }catch(PDOException $e){
                die ("Error : " . $e->getMessage());
            }
        }

        public function read(){
            return $this->pdo->query("select * from membre")->fetchAll(PDO::FETCH_ASSOC);
        }

        public function readById(int $id){
            $stm = $this->pdo->prepare("select * from membre where id = ?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_ASSOC);
        }

        public function update(int $id, string $nom ,string $email){
            $stm = $this->pdo->prepare("update membre set nom = ? , email = ? where id = ?");
            return $stm->execute([$nom , $email , $id]);
        }

        public function delete(int $id){
            $stm = $this->pdo->prepare("delete from membre where id = ?");
            return $stm->execute([$id]);
        }
    }
?>