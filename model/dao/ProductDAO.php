<?php

require_once "./DBConnection.php";

class ProductDAO {

    private $con = new Connection();

    public function insert_product(array $data) : void
    {

    }

    public function select_product(int $id) : array
    {
        return [`id: {$id}`,'test','test'];
    }

    public function get_products() : array
    {

    }

    public function update_product() : SuccessMessage|ErrorObject // void  //or use a union types such as SuccessMessage|ErrorObject. will create theses classes later. just adding this here rather than using void as an example and future reference
    {
        //code will be added later 
        //return new SuccessMessage('Product updated successfully');
        //return new ErrorObject('Update failed.!');

        //or maybe will handle errors in the controller class instead.
    }

    public function delete_product() : void
    {
        
    }

}