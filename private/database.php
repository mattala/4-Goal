<?php
require_once 'env.php';
class Database
{
    //Database credentials
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_type = DB_TYPE;
    private $db_name = DB_NAME;
    //PDO Connection
    private $conn = null;

    public function connect()
    {
        try {
            //New instance of PDO
            $this->conn = new PDO(
                $this->db_type . ':host=' . $this->db_host . ';dbname=' . $this->db_name,
                $this->db_user,
                $this->db_pass
            );

            //Enable errors for statements
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //Get PDO Connection Exception
            echo 'Connection Error:' . $e->getMessage();
        }
        //Returns database connection
        return $this->conn;
    }
}
