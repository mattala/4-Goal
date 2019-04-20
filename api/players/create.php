<?php
//Enable api headers..
$is_api = true;
//initialize script
include_once '../../private/initialize.php';
//Import model
use Models\Player;
//Extra needed HTTP Attributes for post request
header('Access-Control-Allow-Methods: POST');
//Allowing headers for POST (including the ones in initialize.php)
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Authorization,X-Requested-With');


//New instance of player
$player = new Player($db);


//Get raw posted data as an object
$data = json_decode(file_get_contents("php://input"));

$player->name = $data->name;
$player->phone = $data->phone;
$player->skill_rating = $data->skill_rating;
$player->man_of_the_match = $data->man_of_the_match;

//Create new Player
if ($player->create()) {
    //Will respond with this if the create method returned true
    echo json_encode([
        'message' => 'Player Created.'
    ]);
} else {
    //Will respond with this if the create method failed and returned false
    echo json_encode([
        'message' => 'Player NOT! Created.'
    ]);
}
