<?php

declare(strict_types=1);

require_once "../Product.php";
require_once "../dao/ProductDAO.php";

class ProductResourceService {

    private $method;
    private $id;
    private $data;

    public function __construct(string $method, int $id, array $data)
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

    public function updateProduct() : int
    {
        $dao = new ProductDAO();
        $current = $this->selectProduct();
        return $dao->update_product($current, $this->data);
    }
    
    public function deleteProduct() : int
    {
        $dao = new ProductDAO();
        return $dao->delete_product($this->id);
    }
}