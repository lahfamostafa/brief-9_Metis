<?php
    class Membre{
        private $id ;
        private $nom ;
        private $email ;

        public function __construct(String $nom , String $email){
            $this->setNom($nom);
            $this->setEmail($email);
        }
        
        public function getId(){
            return $this->id;
        }
        public function setId(int $id){
            $this->id = $id;
        }

        public function getNom(){
            return $this->nom;
        }
        public function setNom(string $nom){
            if(empty($nom)){
                throw new Exception("Nom invalid");
            }
            $this->nom = $nom;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail(string $email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new Exception ("Email invalid");
            }
            $this->email = $email;
        }
    }

?>