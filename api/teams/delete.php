<?php
//Enable api headers..
$is_api = true;
//initialize script
include_once '../../private/initialize.php';
//Needed model
include_once MODELS_PATH . '/team.php';

//Extra needed HTTP Attributes for post request
header('Access-Control-Allow-Methods: DELETE');
//Allowing headers for POST (including the ones in initialize.php)
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Authorization,X-Requested-With');


//New instance of team
$team = new team($_DB);


//Get raw posted data as an object 
$data = json_decode(file_get_contents("php://input"));

//Set ID to DELETE
$team->id = $data->id;

//Delete team
if ($team->delete()) {
    echo json_encode([
        'message' => 'Team Deleted.'
    ]);
} else {
    echo json_encode([
        'message' => 'Team NOT Deleted.'
    ]);
}
