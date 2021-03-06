<?php
//Add auto loading namespaces?
// require_once 'ModelsBase.php';
namespace Models;

use Models\ModelsBase;
use PDO;

class Player extends ModelsBase
{
    //DB related fields
    protected $table = 'players';
    //Player Properties
    //Migrated id to a more OOP approach models base...
    public $id;
    public $name;
    public $phone;
    public $skill_rating;
    public $man_of_the_match;
    public $user_id;
    //TEAM ID MIGRATED TO BREAKDOWN TABLE

    //Constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }


    //Insert into DB function
    public function create()
    {
        $sql = 'INSERT INTO ' . $this->table .
            ' SET   name =:name,
                    phone =:phone,
                    skill_rating =:skill_rating,
                    man_of_the_match =:man_of_the_match,
                    user_id =:user_id
            ';
        //Prepare statement
        $stmt = $this->conn->prepare($sql);

        // //Data cleaning
        // $this->clean_binder('Players');

        //Bind Parameters
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':skill_rating', $this->skill_rating);
        $stmt->bindParam(':man_of_the_match', $this->man_of_the_match);
        $stmt->bindParam(':user_id', $this->user_id);
        //If the prepared statement executes
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }

    //Update player
    public function update()
    {
        $sql = 'UPDATE ' . $this->table .
            ' SET   
                    name =:name,
                    phone =:phone,
                    skill_rating =:skill_rating,
                    man_of_the_match =:man_of_the_match,
                    user_id =:user_id
            WHERE
                    id = :id
            LIMIT 1';
        //Prepare statement
        $stmt = $this->conn->prepare($sql);

        //Bind Parameters
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':skill_rating', $this->skill_rating);
        $stmt->bindParam(':man_of_the_match', $this->man_of_the_match);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':user_id', $this->user_id);
        //MIGRATED
        // $stmt->bindParam(':team_id', $this->team_id);
        //If the prepared statement executes
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }


    /**
     * @return void fetch a single row of player
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
        $this->phone = $row['phone'];
        $this->skill_rating = $row['skill_rating'];
        $this->man_of_the_match = $row['man_of_the_match'];
    }

    /**
     * Login fetch player 
     * @return array player based on user id
     */
    public function fetch_player($user_id)
    {
        //SQL to be prepared and then executed
        $sql = 'SELECT * 
                    FROM ' . $this->table . ' WHERE user_id = ? LIMIT 1';

        //Prepare statement        
        $stmt = $this->conn->prepare($sql);

        //Bind parameters
        $stmt->bindParam(1, $user_id);

        //Execute Query
        $stmt->execute();
        //It's known that we will fetch one and only one row
        //Fetch Assoc mode
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}
