<?php


class Room
{


    private $idroom=null;
   private $roomtype=null;
    private $price=null;
   private $photo;

    /**
     * room constructor.
     * @param $idroom
     * @param $roomtype
     * @param $price
     * @param $photo
     */
    public function __construct( $roomtype, $price, $photo)
    {

        $this->roomtype = $roomtype;
        $this->price = $price;
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getIdroom()
    {
        return $this->idroom;
    }

    /**
     * @param mixed $idroom
     */
    public function setIdroom($idroom)
    {
        $this->idroom = $idroom;
    }

    /**
     * @return mixed
     */
    public function getRoomtype()
    {
        return $this->roomtype;
    }

    /**
     * @param mixed $roomtype
     */
    public function setRoomtype($roomtype)
    {
        $this->roomtype = $roomtype;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


}