<?php
declare(strict_types=1);

namespace Model\Dao;

use Model\Dao\DBConnection;
use \PDO;

class ProductDAO {

    //decided not to extend the Connection class (as per Liskov subsititution principle)
    private $pdo;

    public function __construct()
    {
        $this->pdo = new DBConnection();
    }

    private $conn;
    

    public function insert_product(array $data) : string
    {
        $this->conn = $this->pdo->open();

        $sql = "INSERT INTO products (name, price, stocks, is_active) 
                VALUES (:name, :price, :stocks, :is_active)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindValue(":price", $data["price"]);
        $stmt->bindValue(":stocks", $data["stocks"], PDO::PARAM_INT);
        $stmt->bindValue(":is_active", $data["is_active"], PDO::PARAM_INT);
        $stmt->execute();

        return $this->conn->lastInsertId();

    }

    public function select_product(int $id) : array
    {
        $this->conn = $this->pdo->open();

        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data) $data["is_active"] = (bool) $data["is_active"];

        return $data;
    }

    public function get_products() : array
    {
        $this->conn = $this->pdo->open();

        $sql = "SELECT * FROM products";
        $stmt = $this->conn->query($sql);

        $data = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $row["is_active"] = (bool) $row["is_active"];
            $data[] = $row;
        }
        return $data;
    }

    // public function update_product() : SuccessMessage|ErrorObject // void  //or use a union types such as SuccessMessage|ErrorObject. will create theses classes later. just adding this here rather than using void as an example and future reference
    // {
    //     //code will be added later 
    //     //return new SuccessMessage('Product updated successfully');
    //     //return new ErrorObject('Update failed.!');

    //     //or maybe will handle errors in the controller class instead.
    // }

    public function update_product(array $current, array $new): int
    {
        $this->conn = $this->pdo->open();

        $sql = "UPDATE products
                SET name = :name,
                price = :price,
                stocks = :stocks,
                is_active = :is_active
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":name", $new["name"] ?? $current["name"], PDO::PARAM_STR);
        $stmt->bindValue(":price", $new["price"] ?? $current["price"]);
        $stmt->bindValue(":stocks", $new["stocks"] ?? $current["stocks"], PDO::PARAM_INT);
        $stmt->bindValue(":is_active", $new["is_active"] ?? $current["is_active"], PDO::PARAM_BOOL);
        $stmt->bindValue(":id", $current["name"], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();

    }

    public function delete_product(int $id) : int
    {
        $this->conn = $this->pdo->open();

        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

}