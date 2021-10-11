<?php


class DVD extends Product
{
private $dvdID, $sizeMB;

    /**
     * DVD constructor.
     * @param $dvdID
     * @param $sizeMB
     */
    public function __construct($ID, $SKU, $productName, $price, $dvdID, $sizeMB)
    {
        parent::__construct($ID, $SKU, $productName, $price);
        $this->dvdID = $dvdID;
        $this->sizeMB = $sizeMB;
    }

    /**
     * @return mixed
     */
    public function getDvdID()
    {
        return $this->dvdID;
    }

    /**
     * @param mixed $dvdID
     */
    public function setDvdID($dvdID)
    {
        $this->dvdID = $dvdID;
    }

    /**
     * @return mixed
     */
    public function getSizeMB()
    {
        return $this->sizeMB;
    }

    /**
     * @param mixed $sizeMB
     */
    public function setSizeMB($sizeMB)
    {
        $this->sizeMB = $sizeMB;
    }



}