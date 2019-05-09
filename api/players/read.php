<?php
//Enable api headers..
$is_api = true;
//initialize script
//Database and altered headers attributes
include_once '../../private/initialize.php';

//Import Model
use Models\Player;

//New instance of player
$players = new Player($_DB);
//Players query
$result = $players->read();


//Get row count

#############################
##Streamline this process..#
############################
//Check if any players
//Preparing json object
$players_arr = array();
$players_arr['data'] = array();

//While there is a record keep fetching data...
foreach ($result as $row) {
    //Extract record
    extract($row);
    //Add record in an associative array
    $player_record = [
        'id' => $id,
        'name' => $name,
        'phone' => $phone,
        'skill_rating' => $skill_rating,
        'man_of_the_match' => $man_of_the_match
    ];
    //Push to "Data"
    array_push($players_arr['data'], $player_record);
}
//When this entire process is done echo json
echo json_encode($players_arr);
