<?php
//Path constants and DB connection
include_once '../../private/initialize.php';
//Needed model
include_once MODELS_PATH . '/Players.php';

//Global variable $db
$player = new Players($db);

//kill request if id was not set as a GET parameter
$player->id = $_GET['id'] ??  die('No player id was specified');

//Get single player
$player->read_single();

//Prepare json
$player_arr = [
    'id' => $player->id,
    'name' => $player->name,
    'phone' => $player->phone,
    'skill_rating' => $player->skill_rating,
    'man_of_the_match' => $player->man_of_the_match
];

#Return a single object of player
//Make json
echo json_encode($player_arr);
