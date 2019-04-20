<?php
include_once '../../private/initialize.php';

//Needed model 
include_once MODELS_PATH . '/Team.php';

//Team object
$team = new Team($db);

//DB Execute query
$result = $team->read();

//Rows returned 
$rows = $result->rowCount();

//if any rows returned 
if ($rows > 0) {
    //Prepare array to be encoded to json
    $teams_arr = array();
    $teams_arr['data'] = array();
    while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
        //Extract resulted record 
        extract($record);
        $record_arr = [
            'id' => $id,
            'name' => $name,
            'team_size' => $team_size
        ];
        //Push extracted team array into teams array of 'data' with each iteration
        array_push($teams_arr['data'], $record_arr);
    }
    //echo out the json object of Teams
    echo json_encode($teams_arr);
} else {
    echo json_encode([
        'message' => 'No teams were found.'
    ]);
}
