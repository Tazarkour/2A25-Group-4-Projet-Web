<?php
    class Service {
        public $idService = null;
        public $nom_service;
        public $num_chambre=null;
        public $facture;
		 public  $dateS;

        public function getIdService () {
            return $this->idService;
        }

        public function getNom_Service (){
            return $this->nom_service;
        }

        public function getNum_Chambre (){
            return $this->num_chambre ;
        }

        public function getFacture (){
            return $this->facture;
        }
  public function getDateS(){
            return $this->dateS;
        }
        public function setNom_Service ($nom_service){
            $this->nom_service = $nom_service;
        }

        public function setNum_Chambre ($num_chambre){
            $this->num_chambre = $num_chambre;
        }

        public function setFacture($facture){
            $this->facture= $facture;
        }
		public function setDate($date){
            $this->date= $date;
        }
    }
