<?php
    class Activite {
        private $id;
        private $description;
        private $statut;
        private $dateCreation;
        private $projetId;


        public function __construct(string $description, string $statut, DateTime $dateCreation, int $projetId) {
            $this->description = $description;
            $this->statut = $statut;
            $this->dateCreation = $dateCreation;
            $this->projetId = $projetId;
        }

        public function getId(){
            return $this->id;
        }
        public function setId(int $id){
            $this->id = $id;
        }

        public function getDescription(){
            return $this->description;
        }
        public function setDescription(string $description){
            if(empty($description)){
                throw new Exception("Description invalid");
            }
            $this->description = $description;
        }

        public function getStatut(){
            return $this->statut;
        }
        public function setStatut(string $statut){
            if(empty($statut)){
                throw new Exception("Statut invalid");
            }
            $this->statut = $statut;
        }

        public function getDateCreation() {
            return $this->dateCreation;
        }

        public function getProjetId() {
            return $this->projetId;
        }
    }
?>