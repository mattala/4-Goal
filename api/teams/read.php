<?php
//Enable api headers..
$is_api = true;
//initialize script
include_once '../../private/initialize.php';

use Models\Team;
//Needed model 
include_once MODELS_PATH . '/Team.php';

//Team object
$team = new Team($_DB);

//DB Execute query
$result = $team->read();


//if any rows returned 

//Prepare array to be encoded to json
$teams_arr = array();
foreach ($result as $record) {
    //Extract resulted record 
    extract($record);
    $team_row = [
        'id' => $id,
        'name' => $name,
        'team_size' => $team_size
    ];
    //Push extracted team array into teams array    each iteration
    array_push($teams_arr, $team_row);
}
//echo out the json object of Teams
echo json_encode($teams_arr);
