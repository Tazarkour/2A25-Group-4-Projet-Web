<?php
class User
{
	public $nom;
	public $prenom;
	public $sexe;
	public $email;
	public $date;
	public $login;
	public $password;
	public $id;

	 function __construct($nom,$prenom,$sexe,$email,$date,$login,$password)
	
	{
			 $this->nom=$nom;
		 $this->prenom=$prenom;
		 $this->email=$email;
		 $this->sexe=$sexe;
		 $this->date=$date;
		 $this->login=$login;
		 $this->password=$password;	
		 	}
}

?>