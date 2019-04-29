<?php

namespace Models;

use Models\ModelsBase;
use PDO;

class User extends ModelsBase
{
    public $conn;
    protected $table = "Users";

    public $email;

    public $password;

    ///Still working here..
    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }
    /**Get last inserted id */
    public function last_insert_id()
    {
        return $this->conn->lastInsertId();
    }
    /**Registers a user */
    public function register()
    {
        //SQL to be executed
        $sql = 'INSERT INTO ' . $this->table .
            ' SET   email =:email,
                    password =:password
            ';
        $stmt = $this->conn->prepare($sql);

        //Parameter binding
        $stmt->bindParam('email', $this->email);
        //$2y$ <- Hashing pattern
        $stmt->bindParam('password', $this->password);
        if ($stmt->execute()) {
            return true;
        } else {
            //When insert fails
            echo "Error: " . $stmt->error;
            return false;
        }
    }
    /**
     * First layer of authentication selects user associated with the email if it exists
     *
     */
    public function login()
    {
        //SQL to be prepared and then executed
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE email = ? ';

        //Prepare statement        
        $stmt = $this->conn->prepare($sql);

        var_dump($sql);
        die();
        //Bind parameters
        $stmt->bindParam(1, $this->email);

        //Execute Query
        $stmt->execute();

        //It's known that we will fetch one and only one row
        //Fetch Assoc mode
        $row = $stmt->fetch();
        var_dump($row);
        die();
        $row['email'] = $this->email;
        $row['password'] = $this->password;
    }
}
