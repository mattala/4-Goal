<?php

include_once '../../private/initialize.php';
//Import model
use Models\Player;

//Extra needed HTTP Attributes for post request
header('Access-Control-Allow-Methods: PUT');
//Allowing headers for POST (including the ones in initialize.php)
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Authorization,X-Requested-With');


//New instance of player
$player = new Player($db);


//Get raw posted data as an object
$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$player->id = $data->id;

//Set props
$player->name = $data->name;
$player->phone = $data->phone;
$player->skill_rating = $data->skill_rating;
$player->man_of_the_match = $data->man_of_the_match;

//Create new Player
if ($player->update()) {
    //Will respond with this if the create method returned true
    echo json_encode([
        'message' => 'Player Updated.'
    ]);
} else {
    //Will respond with this if the create method failed and returned false
    echo json_encode([
        'message' => 'Player NOT! Updated.'
    ]);
}
