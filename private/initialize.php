<?php
/** Requires the API SPECIFIC SCRIPTS */



//Needed scripts
require_once 'path_finder.php';
require_once('Database.php');

//Class Autoloader 
require_once  PROJECT_PATH . '\vendor\autoload.php';

#Request headers

//Allow access with header attributes override
//API Specific
if (isset($is_api)) {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
}

#Globally accessible database connection

//New instance of DB & Connection
$database = new Database();
//DB connection;
$db = $database->connect();
