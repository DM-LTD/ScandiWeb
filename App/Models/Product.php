<?php


abstract class Product
{
    private $ID, $SKU, $productName, $price;

    /**
     * Product constructor.
     * @param $ID
     * @param $SKU
     * @param $productName
     * @param $price
     */
    public function __construct($ID, $SKU, $productName, $price)
    {
        $this->ID = $ID;
        $this->SKU = $SKU;
        $this->productName = $productName;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getSKU()
    {
        return $this->SKU;
    }

    /**
     * @param mixed $SKU
     */
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
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


}