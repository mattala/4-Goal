<?php
abstract class ModelsBase
{
    protected $table;
    protected $conn;
    //Cleans data of html tags and special characters
    //Binds that data to the PDO statement
    /**
     * This method cleans data of any html tags
     * @param $class String name of the class
     * @param $stmt the PDO stmt to be executed
     */
    public function clean_binder(String $class, $stmt)
    {
        //Get this cla  ss vars
        foreach (get_class_vars($class) as $prop) {
            //Skip these fields
            if ($prop == 'id' || $prop == 'table' || $prop == 'conn') {
                //Skip these properties
                continue;
            }
            //Clean the following in each iteration
            $this->{$prop} = htmlspecialchars(strip_tags($this->$prop));
            //Bind params
            $stmt->bindParam(':' . $prop, $this->{$prop});
        }
    }
    //Read a table
    /**
     * Generic read method use in all children classes
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


    //Delete table record
    /**
     * Generic delete method used in all children classes
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
}
