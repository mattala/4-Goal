<?php

namespace Models;

use Models\ModelsBase;

class Game extends ModelsBase
{
    //
    protected $table = 'gamest';

    public $id;
    public $start_at;
    public $score;
    public $field_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    /**
     * @return bool operation result game create.
     */
    public function create()
    {
        //SQL Query Statement
        $sql = "INSERT INTO " . $this->table .
            " SET 
                start_at =:start_at,
                score =:score,
                field_id=:field_id";

        $stmt = $this->conn->prepare($sql);
        //Parameters binding
        $stmt->bindParam(':start_at', $this->start_at);
        $stmt->bindParam(':score', $this->score);
        $stmt->bindParam(':field_id', $this->field_id);

        //Handle errors
        if ($stmt->execute()) {
            return true;
        }
        //When insert fails
        echo "Error: " . $stmt->error;
        return false;
    }
}
