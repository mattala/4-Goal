<?php

namespace Models;

use Models\ModelsBase;
use PDO;

class User extends ModelsBase
{
    protected $table = "Users";

    public $email;

    public $password;

    public $role_id;
    ///Still working here..
    public function __construct(PDO $db)
    {
        $this->conn = $db;
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
        //Bind parameters
        $stmt->bindParam(1, $this->email);

        //Execute Query
        $stmt->execute();

        //It's known that we will fetch one and only one row
        //Fetch Assoc mode
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $sql = 'UPDATE ' . $this->table .
            ' SET   
                 email=:email,
                 password=:password,
                 role_id=:role_id   
            WHERE
                    id = :id
            LIMIT 1';
        //Prepare statement
        $stmt = $this->conn->prepare($sql);

        //Bind Parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role_id', $this->role_id);

        //If the prepared statement executes
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }

    /**
     * @return void
     */
    public function read_single()
    {

        //SQL to be prepared and then executed
        $sql = 'SELECT * 
                FROM ' . $this->table . ' WHERE id = ? LIMIT 1';

        //Prepare statement        
        $stmt = $this->conn->prepare($sql);

        //Bind parameters
        $stmt->bindParam(1, $this->id);

        //Execute Query
        $stmt->execute();

        //It's known that we will fetch one and only one row
        //Fetch Assoc mode
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Set properties
        $this->email = $row['email'];
        $this->password = $row['password'];
        $this->role_id = $row['role_id'];
    }
}
