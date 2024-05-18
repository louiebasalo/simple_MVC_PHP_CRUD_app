<?php

require_once "../model/services/ProductResourceService.php";
require_once "../model/services/ProductCollectionService.php";
class ProductController {

    private $data = (array) json_decode(file_get_contents("php://input"), true);
    private $process;
    public function processRequestType(string $method, ?int $id) : void
    {
        if($id){
            $this->process = new ProductResourceService($method, $id, $this->data);
        }else{
            $this->process = new ProductCollectionService($this->data);
        }
    }
    
}