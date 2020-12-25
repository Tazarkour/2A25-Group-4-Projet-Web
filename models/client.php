<?php
     class clients {
        public $idclient = null;
        public $nom;
        public $prenom;
        public $email;
		 public  $message;

        public function getIdclient () {
            return $this->idclient;
        }

        public function getNom(){
            return $this->nom;
        }

        public function getPrenom (){
            return $this->prenom ;
        }

        public function getEmail (){
            return $this->email;
        }
  public function getMessage(){
            return $this->message;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }

        public function setPrenom ($prenom){
            $this->prenom = $prenom;
        }

        public function setEmail($email){
            $this->facture= $facture;
        }
		public function setMessage($message){
            $this->message= $message;
        }
    }