<?php
    abstract class Projet{
        protected $id;
        protected $titre;
        protected $typeProjet;
        protected $idMembre;

        public function __construct($titre, $typeProjet, $idMembre){
            $this->titre = $titre;
            $this->typeProjet = $typeProjet;
            $this->idMembre = $idMembre;
        }
    }
?>