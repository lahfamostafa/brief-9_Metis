<?php
    class ProjetLong extends Projet{
        private $phase;

        public function __construct($titre, $typeProjet, $idMembre, $phase){
            parent::__construct($titre, $typeProjet, $idMembre);
            $this->phase = $phase;
        }


        public function getType(){
            return "Long";
        }
    }
?>