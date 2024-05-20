<?php
declare(strict_types=1);

namespace Model\Services;


use Model\Product;
use Model\Dao\ProductDAO;

class ProductCollectionService {

    private $data;
    private $method;
    public function __construct($method, ?array $data)
    {
        $this->data = $data;
        $this->method = $method;
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
        $product = new Product();
        $product->setName($this->data['name']);
        $product->setPrice($this->data['price']);
        $product->setStocks($this->data['stocks']);

        $dao = new ProductDAO();
        $dao->insert_product([
            $product->getName(),
            $product->getPrice(),
            $product->getStocks()
        ]);

    }

    public function getAllProducts() : array
    {
        $dao = new ProductDAO();
        return $dao->get_products();

    }

}