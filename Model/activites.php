<?php
    class Activites {
        public $id;
        public $nom;
        public $activites;
        public $dateS;
        public $places;
        public $email;


        public function getId () {
            return $this->id;
        }

        public function getNom (){
            return $this->nom;
        }

        public function getActivites (){
            return $this->activites ;
        }

        public function getPlaces(){
            return $this->places;
        }
  public function getDateS(){
            return $this->dateS;
        }
        public function setNom ($nom){
            $this->nom = $nom;
        }

        public function setActivites ($activites){
            $this->activites = $activites;
        }

        public function setPlaces($places){
            $this->places= $places;
        }
		public function setDate($date){
            $this->date= $date;
        }
    }
