<?php


class Reservation
{
    private $idreservation=null;
    private $firstname=null;
   private $lastname=null;
    private $adresse=null;
   private $date=null;
   private $tel=null;
    private $email=null;
    private $nbn=null;
    private $room=null;
  private $rp=null;

    private $idroom=null;
    private $iduser=null;
    /**
     * Reservation constructor.
     * @param null $firstname
     * @param null $lastname
     * @param null $adresse
     * @param null $date
     * @param null $tel
     * @param null $email
     * @param null $nbn
     * @param null $room
     * @param null $rp
     * @param null $idroom
     */
    public function __construct($firstname, $lastname, $adresse, $date, $tel, $email, $nbn, $room, $rp, $idroom,$iduser)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->adresse = $adresse;
        $this->date = $date;
        $this->tel = $tel;
        $this->email = $email;
        $this->nbn = $nbn;
        $this->room = $room;
        $this->rp = $rp;
        $this->idroom = $idroom;
        $this->iduser = $iduser;
    }

    /**
     * @return null
     */
    public function getIdroom()
    {
        return $this->idroom;
    }

    /**
     * @param null $idroom
     */
    public function setIdroom($idroom)
    {
        $this->idroom = $idroom;
    }

    /**
     * Reservation constructor.
     * @param null $idroom
     * @param null $firstname
     * @param null $lastname
     * @param null $adresse
     * @param null $date
     * @param null $tel
     * @param null $email
     * @param null $nbn
     * @param null $room
     * @param null $rp
     */


    /**
     * @return null
     */
    public function getIdreservation()
    {
        return $this->idreservation;
    }

    /**
     * @param null $idreservation
     */
    public function setIdreservation($idreservation)
    {
        $this->idreservation = $idreservation;
    }

    /**
     * @return null
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param null $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return null
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param null $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return null
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param null $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param null $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return null
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param null $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return null
     */
    public function getNbn()
    {
        return $this->nbn;
    }

    /**
     * @param null $nbn
     */
    public function setNbn($nbn)
    {
        $this->nbn = $nbn;
    }

    /**
     * @return null
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param null $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return null
     */
    public function getRp()
    {
        return $this->rp;
    }

    /**
     * @param null $rp
     */
    public function setRp($rp)
    {
        $this->rp = $rp;
    }

    /**
     * @return null
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param null $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }


}

