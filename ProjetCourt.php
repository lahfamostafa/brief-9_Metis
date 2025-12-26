<?php
class ProjetCourt extends Projet{
    private $budget;
    
    public function __construct($titre, $typeProjet, $idMembre, $budget){
        parent::__construct($titre, $typeProjet, $idMembre);
        $this->budget = $budget;
        
    }

    public function getType(){
        return "Court";
    }
}
?>