<?php
declare(strict_types=1);

namespace Model;

class Product {

    private $id;
    private $name;
    private $price;
    private $stocks;
    private $is_active;

    // maybe we'll just add the constructor if we include product category in the future

    public function getName() : string
    {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getStocks() : int
    {
        return $this->stocks;
    }

    public function setStocks($stocks)
    {
        $this->stocks = $stocks;
    }

    public function getIsActive() : int
    {
        return $this->is_active;
    }

    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }

}