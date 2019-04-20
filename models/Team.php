<?php

require_once 'ModelsBase.php';

class Team extends ModelsBase
{
    //Set table name
    protected $table = 'teams';
    //Team attributes
    public $id;
    public $name;
    public $team_size;

    //con

    //Constructor
    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }
}
