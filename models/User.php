<?php

namespace Models;

use Models\ModelsBase;
use PDO;

class User extends ModelsBase
{
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
     * @return bool
     */
    public function login($email)
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE email = :email LIMIT 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            //Set fetching mode
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            return true;
        } else {
            return false;
        }
    }
}
