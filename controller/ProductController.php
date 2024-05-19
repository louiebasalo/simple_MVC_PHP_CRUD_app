<?php

require_once "../model/services/ProductResourceService.php";
require_once "../model/services/ProductCollectionService.php";
class ProductController {

    private $data = (array) json_decode(file_get_contents("php://input"), true);
    private $process;
    public function processRequestType(string $method, ?int $id) : array
    {
        if($id){
            $this->process = new ProductResourceService($method, $id, $this->data);
            return $this->process->processRequest();
        }else{
            $this->process = new ProductCollectionService($method, $this->data);
            return $this->process->processRequest();
        }
    }
    
}