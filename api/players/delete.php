<?php

include_once '../../private/initialize.php';
//Import model
use Models\Player;

//Extra needed HTTP Attributes for post request
header('Access-Control-Allow-Methods: DELETE');
//Allowing headers for POST (including the ones in initialize.php)
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Authorization,X-Requested-With');


//New instance of player
$player = new Player($db);


//Get raw posted data as an object 
$data = json_decode(file_get_contents("php://input"));

//Set ID to DELETE
$player->id = $data->id;

//Delete Player
if ($player->delete()) {
    echo json_encode([
        'message' => 'Player Deleted.'
    ]);
} else {
    echo json_encode([
        'message' => 'Player NOT Deleted.'
    ]);
}
