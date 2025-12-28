<?php
    abstract class Projet{
        protected $id;
        protected $titre;
        protected $description;
        protected $idMembre;

        public function __construct($titre, $description, $idMembre){
            $this->titre = $titre;
            $this->description = $description;
            $this->idMembre = $idMembre;
        }

        public function getId(){ return $this->id; }
        public function setId(int $id){ $this->id = $id; }

        public function getTitre(){ return $this->titre; }
        public function getDescription(){ return $this->description; }
        public function getIdMembre(){ return $this->idMembre; }

        abstract public function getType();
        
    }
?>