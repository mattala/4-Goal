<?php


namespace Models;

use Models\ModelsBase;
use PDO;

class Team extends ModelsBase
{
    //Set table name
    protected $table = 'teams';
    //Team attributes
    // public $id;

    public $name;

    public $team_size;

    public $game_id;

    //Constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    /**
     * @return bool operation result
     */
    public function create()
    {
        //SQL Query Statement
        $sql = "INSERT INTO " . $this->table . " SET name =:name, team_size=:team_size";

        $stmt = $this->conn->prepare($sql);
        //Parameters binding
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':team_size', $this->team_size);

        //Handle errors
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }
    /**
     * @return void select one player
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
        $this->name = $row['name'];
        $this->team_size = $row['team_size'];
        $this->game_id = $row['game_id'];
    }

    /**
     * @return bool
     */
    public function update()
    {
        $sql = 'UPDATE ' . $this->table .
            ' SET   
                    name=:name,
                    team_size=:team_size,  
                    game_id =:game_id
              WHERE
                      id = :id
              LIMIT 1';

        //Prepare statement
        $stmt = $this->conn->prepare($sql);

        //Bind Parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':team_size', $this->team_size);
        $stmt->bindParam(':game_id', $this->game_id);
        //If the prepared statement executes
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }
}
