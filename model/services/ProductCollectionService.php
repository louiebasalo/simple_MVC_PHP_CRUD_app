<?php
declare(strict_types=1);

namespace Model\Services;


use Model\Product;
use Model\Dao\ProductDAO;

class ProductCollectionService {

    private $data;
    private $method;
    private $product;
    public function __construct($method, ?array $data, $product)
    {
        $this->data = $data;
        $this->method = $method;
        $this->product = $product;
    }

    public function processRequest(){

        switch ($this->method){
            case "GET":
                return $this->getAllProducts();
            case "POST":
                return $this->addProduct();
            default:
                http_response_code(405);
                header("Allow: GET, POST");

        }
    }

    public function addProduct() 
    {
        $dao = new ProductDAO();
        $dao->insert_product([
            $this->product->getName(),
            $this->product->getPrice(),
            $this->product->getStocks()
        ]);

    }

    public function getAllProducts() : array
    {
        $dao = new ProductDAO();
        return $dao->get_products();

    }

}