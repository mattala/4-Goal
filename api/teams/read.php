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

//Rows returned 
$rows = $result->rowCount();

//if any rows returned 
if ($rows > 0) {
    //Prepare array to be encoded to json
    $teams_arr = array();
    while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
        //Extract resulted record 
        extract($record);
        $team_row = [
            'id' => $id,
            'name' => $name,
            'team_size' => $team_size
        ];
        //Push extracted team array into teams array each iteration
        array_push($teams_arr, $team_row);
    }
    //echo out the json object of Teams
    echo json_encode($teams_arr);
} else {
    echo json_encode([
        'message' => 'No teams were found.'
    ]);
}
