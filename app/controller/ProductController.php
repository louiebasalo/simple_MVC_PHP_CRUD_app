<?php

declare(strict_types=1);


namespace App\Controller;

use App\Model\Services\ProductResourceService;
use App\Model\Services\ProductCollectionService;
use App\Model\Product;

// var_dump($_SERVER);

echo "</br>we are at the product controller </br>";
echo $_SERVER['REQUEST_METHOD']; 
echo '</br>'. file_get_contents("php://input");
echo '</br>'.__DIR__;
echo '</br>'.BASE_PATH;
class ProductController {

    private $data; 
    private $product;
    public function __construct()
    {
        $this->data = (array) json_decode(file_get_contents("php://input"), true);
        $this->product = new Product();
        $this->product->setName($this->data['name']);
        $this->product->setPrice($this->data['price']);
        $this->product->setStocks($this->data['stocks']);
    }
    private $process;

    public function processRequestType(string $method, ?int $id) : array
    {
        if($id){
            $this->process = new ProductResourceService($method, $id, $this->data);
            return $this->process->processRequest();
        }else{
            $this->process = new ProductCollectionService($method, $this->data, $this->product);
            return $this->process->processRequest();
        }
    }

    
}