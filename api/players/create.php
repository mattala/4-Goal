<?php
//initialize script
include_once '../../private/initialize.php';

//HTTP Headers
//========================================
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//Needed HTTP Attributes for POST request
header('Access-Control-Allow-Methods: POST');
//Allowing headers for POST (including the ones in initialize.php)
/**To be changed later. */
header('Access-Control-Allow-Headers: *');
/**Disable for testing */
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Authorization,X-Requested-With');
//========================================

//Import model
use Models\Player;

//New instance of player
$player = new Player($db);


//Get raw posted data as an object

$data = json_decode(file_get_contents("php://input"));

//Handles pre-fired requests for CORS
if (isset($data)) {

    $player->name = $data->name;

    $player->phone = $data->phone;

    $player->skill_rating = $data->skill_rating;

    $player->man_of_the_match = $data->man_of_the_match;
} else {

    //die with this response.
    die(json_encode([
        'message' => 'Something went wrong, Did you forget to send parameters?'
    ]));
}

//Create new Player
if ($player->create()) {
    //Created Status
    http_response_code('201');
    //Will respond with this if the create method returned true
    echo json_encode([
        'message' => 'Player Created.'
    ]);
} else {
    //Will respond with this if the create method failed and returned false
    echo json_encode([
        'message' => 'Player NOT! Created'
    ]);
}
