<?php


namespace Models;

abstract class ModelsBase
{
    //All children classes have a table associated with it
    protected $table;
    //All children classes will use this connection
    protected $conn;

    public $id;
    //Read a table
    /**
     * Generic read method use in all children classes
     * @return array of records
     */
    public function read()
    {
        //SQL to be prepared and then executed
        $sql = 'SELECT * FROM ' . $this->table;

        //Prepared statement
        $stmt = $this->conn->prepare($sql);

        //Execute in db
        $stmt->execute();

        //Return the executed statement
        return $stmt;
    }

    //Read one player


    //Delete table record
    /**
     * Generic delete method used in all children classes
     * @return bool Result of operation
     */
    public function delete()
    {
        //Delete SQL
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id LIMIT 1';

        //Prepare statement
        $stmt = $this->conn->prepare($sql);

        //Bind parameters
        $stmt->bindParam(':id', $this->id);

        //Execute statement
        if ($stmt->execute()) {
            return true;
        }

        //If delete fails
        echo "Encountered Error: " . $stmt->error;
        return false;
    }
    /**Get last inserted id */
    public function last_insert_id()
    {
        return $this->conn->lastInsertId();
    }
}
