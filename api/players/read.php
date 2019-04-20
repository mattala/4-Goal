<?php

//Database and altered headers attributes
include_once '../../private/initialize.php';

//Import Model
use Models\Player;

//New instance of player
$players = new Player($db);
//Players query
$result = $players->read();


//Get row count
$num = $result->rowCount();
#############################
##Streamline this process..#
############################
//Check if any players
if ($num > 0) {
    //Preparing json object
    $players_arr = array();
    $players_arr['data'] = array();

    //While there is a record keep fetching data...
    #$result->fetchAll is problematic
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
} else {
    //Select query returned no rows
    echo json_encode(
        [
            'message' => 'Couldn\'t find any players'
        ]
    );
}
