<?php


class Book extends Product
{
    private $bookID, $weightKG;

    /**
     * Book constructor.
     * @param $ID
     * @param $SKU
     * @param $productName
     * @param $price
     * @param $bookID
     * @param $weightKG
     */
    public function __construct($ID, $SKU, $productName, $price, $bookID, $weightKG)
    {
        parent::__construct($ID, $SKU, $productName, $price);
        $this->bookID = $bookID;
        $this->weightKG = $weightKG;
    }

    /**
     * @return mixed
     */
    public function getBookID()
    {
        return $this->bookID;
    }

    /**
     * @param mixed $bookID
     */
    public function setBookID($bookID)
    {
        $this->bookID = $bookID;
    }

    /**
     * @return mixed
     */
    public function getWeightKG()
    {
        return $this->weightKG;
    }

    /**
     * @param mixed $weightKG
     */
    public function setWeightKG($weightKG)
    {
        $this->weightKG = $weightKG;
    }


}