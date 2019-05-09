<?php

namespace Models;

use PDO;
use Models\ModelsBase;

/**
 * Player | Team | Role
 */
class PTR extends ModelsBase
{

    public $table = 'player_team_role';
    public $team_id;
    public $player_id;
    public $role_id;
    /**
     * Player_Team_Role breakdown table
     */
    public function __construct()
    {
        global $_DB;
        $this->conn = $_DB;
    }

    /**
     * Fetch the rows with the same team id assigned to object
     * @return array of fetched rows
     */
    public function read_team()
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE team_id = ?';

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(1, $this->team_id);

        $stmt->execute();

        $row = $stmt->fetchAll();
        //Return the executed statement

        return $row;
    }
    public function read_single()
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE team_id=:team_id AND player_id=:player_id';

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':team_id', $this->team_id);

        $stmt->bindParam(':player_id', $this->player_id);

        $stmt->execute();

        $row = $stmt->fetch();

        //Set properties
        $this->id = $row['id'];
        $this->team_id = $row['team_id'];
        $this->player_id = $row['player_id'];
        $this->role_id = $row['role_id'];
    }

    public function read_manager()
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE player_id=:player_id AND role_id=:role_id';

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':player_id', $this->player_id);

        $stmt->bindParam(':role_id', $this->role_id);

        $stmt->execute();

        $row = $stmt->fetch();

        //Set properties
        $this->id = $row['id'];
        $this->team_id = $row['team_id'];
        $this->player_id = $row['player_id'];
        $this->role_id = $row['role_id'];
    }

    //Insert 
    public function create()
    {
        $sql = 'INSERT INTO ' . $this->table .
            ' SET   team_id =:team_id,
                        player_id =:player_id,
                        role_id =:role_id
                ';
        //Prepare statement
        $stmt = $this->conn->prepare($sql);

        // //Data cleaning
        // $this->clean_binder('Players');

        //Bind Parameters
        $stmt->bindParam(':team_id', $this->team_id);
        $stmt->bindParam(':player_id', $this->player_id);
        $stmt->bindParam(':role_id', $this->role_id);

        //If the prepared statement executes
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }
    //Insert 
    public function update()
    {
        $sql = 'UPDATE ' . $this->table .
            ' 
            SET   
                team_id =:team_id,
                player_id =:player_id,
                role_id =:role_id
            WHERE
                id=:id

                    ';
        //Prepare statement
        $stmt = $this->conn->prepare($sql);

        // //Data cleaning
        // $this->clean_binder('Players');

        //Bind Parameters
        $stmt->bindParam(':team_id', $this->team_id);
        $stmt->bindParam(':player_id', $this->player_id);
        $stmt->bindParam(':role_id', $this->role_id);

        $stmt->bindParam(':id', $this->id);

        //If the prepared statement executes
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }
}
