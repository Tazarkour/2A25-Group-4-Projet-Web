<?php
    class Service {
        public $idservice = null;
        public $nom;
        public $prix;

        public function getIdService () {
            return $this->idservice;
        }

        public function getNomService (){
            return $this->nom;
        }

        public function getPrix (){
            return $this->prix;
        }
        public function setNomServices ($nom){
            $this->nom = $nomServices;
        }

        public function setPrix ($prix){
            $this->prix = $prix;
        }
    }
