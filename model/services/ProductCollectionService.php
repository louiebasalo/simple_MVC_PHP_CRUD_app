<?php

require_once "../Product.php";
require_once "../dao/ProductDAO.php";

class ProductCollectionService {

    private $data;
    public function __construct(?array $data)
    {
        $this->data = $data;
    }
    public function addProduct($data) 
    {
        $product = new Product();
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setStocks($data['stocks']);

        $dao = new ProductDAO();
        $dao->insert_product([
            $product->getName(),
            $product->getPrice(),
            $product->getStocks()
        ]);

    }

    public function getAllProducts() : array
    {

    }

}