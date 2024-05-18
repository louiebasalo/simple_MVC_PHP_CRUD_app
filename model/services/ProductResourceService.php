<?php

require_once "../Product.php";
require_once "../dao/ProductDAO.php";

class ProductResourceService {

    private $method;
    private $id;
    private $data;

    public function __construct(string $method, int $id, $data)
    {
        $this->method = $method;
        $this->id = $id;
        $this->data = $data;
    }

    public function processRequest(){

        switch ($this->method){
            case "GET":
                return $this->selectProduct();
            case "PATCH":
                return $this->updateProduct();
            case "DELETE":
                return $this->deleteProduct();
            default:
                http_response_code(405);
                header("Allow: GET, POST");

        }
    }

    public function selectProduct() : array
    {
        $dao = new ProductDAO();
        return $dao->select_product($this->id);
    }

    public function updateProduct() : void
    {

    }
    
    public function deleteProduct() : void
    {
        
    }
}