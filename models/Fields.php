<?php

namespace Models;

use Models\ModelsBase;

class Fields extends ModelsBase
{
    protected $table = 'football_fields';
    public $name;
    public $address;
    public $rating;
    public $price;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
