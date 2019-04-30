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
    /**
     * @return PDO Connection to database
     */
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
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Change default fetch mode
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //Get PDO Connection Exception
            echo 'Connection Error:' . $e->getMessage();
            die();
        }
        //Returns database connection
        return $this->conn;
    }

    /**
     * @return array Custom select query
     */
    public function query($sql)
    {
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
