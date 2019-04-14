<?php
class players
{
    //DB related fields
    private $conn;
    private $table = 'player';
    //Player Properties
    public $id;
    public $name;
    public $phone;

    //Constructor
    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }
    //Read
    public function read_all()
    {
        //SQL to be prepared and then executed
        $sql = 'SELECT * from players';

        //Prepared statement
        $stmt = $this->conn->prepare($sql);

        //Execute in db
        $stmt->execute();

        //Return the executed statement
        return $stmt;
    }
}
