<?php
/** Requires the API SPECIFIC SCRIPTS */



//Needed scripts
require_once('path_finder.php');
require_once('Database.php');

#Request headers

//Allow access with header attributes override
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


#Globally accessible database connection

//New instance of DB & Connection
$database = new Database();
//DB connection;
$db = $database->connect();
