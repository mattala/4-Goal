<?php

namespace Models;

use Models\ModelsBase;

class Fields extends ModelsBase
{
    protected $table = 'fields';
    public $name;
    public $address;
    public $rating;
    public $price;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    /**
     * @return void update fields object with fetched row
     */
    public function read_single()
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->name = $row['name'];
        $this->address = $row['address'];
        $this->rating = $row['rating'];
        $this->price = $row['price'];
    }

    /**
     * @return bool operation output
     */
    public function create()
    {
        //SQL Query Statement
        $sql = "INSERT INTO " . $this->table .
            " SET 
                name =:name,
                address =:address,
                rating=:rating,
                price =:price";

        $stmt = $this->conn->prepare($sql);
        //Parameters binding
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':rating', $this->rating);
        $stmt->bindParam(':price', $this->price);

        //Handle errors
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }
}
